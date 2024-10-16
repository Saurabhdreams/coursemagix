<?php

namespace App\Http\Controllers\User\Curriculum;

use App\Constants\Constant;
use App\Http\Controllers\Controller;
use App\Http\Helpers\LimitCheckerHelper;
use App\Http\Helpers\Uploader;
use App\Models\User\Curriculum\Course;
use App\Models\User\Language;
use App\Models\User\Curriculum\CourseInformation;
use App\Models\User\Curriculum\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
  public function index(Request $request, $id)
  {
    $information['langs'] = Language::where('user_id', Auth::guard('web')->user()->id)->get();

    $information['language'] = Language::where('code', $request->language)->where('user_id', Auth::guard('web')->user()->id)->first();
    $information['defaultLang'] = Language::where('is_default', 1)->where('user_id', Auth::guard('web')->user()->id)->first();

    $information['course'] = Course::where('user_id', Auth::guard('web')->user()->id)->where('id', $id)->first();
    $information['courseInformation'] = CourseInformation::where('course_id', $id)->where('language_id', $information['language']->id)->where('user_id', Auth::guard('web')->user()->id)->first();

    if (!empty($information['courseInformation'])) {
      $id = $information['courseInformation']->id;

      $information['modules'] = Module::where('course_information_id', $id)
        ->orderBy('serial_number', 'ASC')
        ->get();
    } else {
      Session::flash('warning', 'Please add course contents for ' . $information['language']->name . ' first!');
      return back();
    }

    return view('user.curriculum.module.index', $information);
  }

  public function store($id, Request $request)
  {
    $count = LimitCheckerHelper::currentModulesCount(Auth::guard('web')->user()->id, $request->user_language_id);//getting currently added module by user
    $module_limit = LimitCheckerHelper::moduleLimit(Auth::guard('web')->user()->id);//module limit count of current package
    if ($count >= $module_limit) {
        Session::flash('warning', 'Module limit has been exceeded');
        return "success";
    }
    
    $rules = [
      'title' => 'required',
      'status' => 'required',
      'serial_number' => 'required',
      'user_language_id' => 'required'
    ];

    $messages = [
      'user_language_id.required' => 'The language field is required'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return Response::json([
        'errors' => $validator->getMessageBag()->toArray()
      ], 400);
    }

    $courseInfoId = CourseInformation::where('user_id', Auth::guard('web')->user()->id)->where('course_id', $id)->where('language_id', $request->user_language_id)->firstOrFail()->id;

    Module::create($request->except('course_information_id', 'user_language_id') + [
      'course_information_id' => $courseInfoId,
      'user_id' => Auth::guard('web')->user()->id,
      'language_id' => $request->user_language_id
    ]);

    $request->session()->flash('success', 'New module added successfully!');
    return "success";
  }

  public function update(Request $request)
  {
    $module = Module::query()->where('user_id', Auth::guard('web')->user()->id)->find($request->id);
    $count = LimitCheckerHelper::currentModulesCount(Auth::guard('web')->user()->id, $module->language_id);//getting currently added module by user
    $module_limit = LimitCheckerHelper::moduleLimit(Auth::guard('web')->user()->id);//module limit count of current package
    if ($count > $module_limit) {
        Session::flash('warning', 'Please delete some modules to enable "Edit" feature.');
        return "success";
    }

    $rules = [
      'title' => 'required',
      'status' => 'required',
      'serial_number' => 'required'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return Response::json([
        'errors' => $validator->getMessageBag()->toArray()
      ], 400);
    }

    $module->update($request->all());
    $request->session()->flash('success', 'Module updated successfully!');
    return "success";
  }

  public function destroy($id)
  {
    $module = Module::query()->where('user_id', Auth::guard('web')->user()->id)->find($id);
    $lessons = $module->lesson()->get();

    foreach ($lessons as $lesson) {
      $lessonContents = $lesson->content()->get();
      foreach ($lessonContents as $lessonContent) {
        if ($lessonContent->type == 'video') {
            Uploader::remove(Constant::WEBSITE_LESSON_CONTENT_VIDEO, $lessonContent->video_unique_name);
        } else if ($lessonContent->type == 'file') {
            Uploader::remove(Constant::WEBSITE_LESSON_CONTENT_FILE, $lessonContent->file_unique_name);
        } else if ($lessonContent->type == 'quiz') {
          $lessonQuizzes = $lessonContent->quiz()->get();
          foreach ($lessonQuizzes as $lessonQuiz) {
            $lessonQuiz->delete();
          }
        }
        $lessonContent->delete();
      }
      $lesson->delete();
    }

    // find out the course of this module
    $courseInfo = $module->courseInformation;
    $course = $courseInfo->course;

    $module->delete();

    // update course status (draft) of this module, when no module left
    $totalModules = Module::query()->where('course_information_id', $courseInfo->id)
                           ->where('user_id', Auth::guard('web')->user()->id)
                           ->where('status', 'published')
                           ->count();

    if ($totalModules == 0) {
      $course->update([
        'status' => 'draft'
      ]);
    }

    // update course's total period
    $totalModulePeriod = Module::query()
        ->where('user_id', Auth::guard('web')->user()->id)
        ->where('course_information_id', $courseInfo->id)
        ->sum(DB::raw('TIME_TO_SEC(duration)'));

    $courseDuration = gmdate('H:i:s', $totalModulePeriod);

    $course->update([
      'duration' => $courseDuration
    ]);

    return redirect()->back()->with('success', 'Module deleted successfully!');
  }

  public function bulkDestroy(Request $request)
  {
    $ids = $request->ids;

    foreach ($ids as $id) {
      $module = Module::query()->where('user_id', Auth::guard('web')->user()->id)->find($id);
      $lessons = $module->lesson()->get();
      foreach ($lessons as $lesson) {
        $lessonContents = $lesson->content()->get();
        foreach ($lessonContents as $lessonContent) {
          if ($lessonContent->type == 'video') {
              Uploader::remove(Constant::WEBSITE_LESSON_CONTENT_VIDEO, $lessonContent->video_unique_name);
          } else if ($lessonContent->type == 'file') {
              Uploader::remove(Constant::WEBSITE_LESSON_CONTENT_FILE, $lessonContent->file_unique_name);
          } else if ($lessonContent->type == 'quiz') {
            $lessonQuizzes = $lessonContent->quiz()->get();
            foreach ($lessonQuizzes as $lessonQuiz) {
              $lessonQuiz->delete();
            }
          }
          $lessonContent->delete();
        }
        $lesson->delete();
      }

      // find out the course of this module
      $courseInfo = $module->courseInformation;
      $course = $courseInfo->course;
      $module->delete();
    }

    // update course status (draft) of this module, when no module left
    $totalModules = Module::query()->where('user_id',Auth::guard('web')->user()->id)->where('course_information_id', $courseInfo->id)->where('status', 'published')->count();

    if ($totalModules == 0) {
      $course->update([
        'status' => 'draft'
      ]);
    }
    // update course's total period
    $totalModulePeriod = Module::query()->where('user_id',Auth::guard('web')->user()->id)->where('course_information_id', $courseInfo->id)->sum(DB::raw('TIME_TO_SEC(duration)'));
    $courseDuration = gmdate('H:i:s', $totalModulePeriod);
    $course->update([
      'duration' => $courseDuration
    ]);
    $request->session()->flash('success', 'Modules deleted successfully!');
    return "success";
  }
}

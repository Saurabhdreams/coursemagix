<?php

namespace App\Http\Controllers\User\Teacher;

use App\Constants\Constant;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Uploader;
use App\Http\Requests\Instructor\StoreRequest;
use App\Http\Requests\Instructor\UpdateRequest;
use App\Models\User\BasicSetting;
use App\Models\User\Language;
use App\Models\User\Teacher\Instructor;
use App\Rules\ImageMimeTypeRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // first, get the language info from db
        $information['language'] = Language::query()->where('code', $request->language)->where('user_id', Auth::guard('web')->user()->id)->first();
        $information['themeInfo'] = BasicSetting::query()->where('user_id',Auth::guard('web')->user()->id)->select('theme_version')->first();
        $information['instructors'] = Instructor::query()->where('language_id', $information['language']->id)
            ->orderByDesc('id')
            ->get();
        return view('user.instructor.index', $information);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        // get all the languages from db
        $languages = Language::query()->where('user_id',Auth::guard('web')->user()->id)->get();
        $information['languages'] = $languages;
        $information['defaultLang'] = $languages->where('is_default',1)->first();
        return view('user.instructor.create', $information);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(StoreRequest $request)
    {
        $imageName = Uploader::upload_picture(Constant::WEBSITE_INSTRUCTOR_IMAGE, $request->file('image'));

        Instructor::create($request->except('image', 'description','user_language_id','user_id') + [
                'image' => $imageName,
                'description' => Purifier::clean($request->description),
                'user_id' => Auth::guard('web')->user()->id,
                'language_id' => $request->user_language_id
            ]);

        $request->session()->flash('success', 'New instructor added successfully!');

        return "success";
    }

    /**
     * Update featured status of a specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateFeatured(Request $request, $id)
    {
        $instructor = Instructor::query()->where('user_id', Auth::guard('web')->user()->id)->find($id);

        if ($request['is_featured'] == 1) {
            $instructor->update(['is_featured' => 1]);
            $request->session()->flash('success', 'Instructor featured successfully!');
        } else {
            $instructor->update(['is_featured' => 0]);
            $request->session()->flash('success', 'Instructor unfeatured successfully!');
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Request $request, $id)
    {
        $information['language'] = Language::query()
            ->where('user_id',Auth::guard('web')->user()->id)
            ->where('code', $request['language'])
            ->first();
        $information['instructor'] = Instructor::query()->where('user_id',Auth::guard('web')->user()->id)->find($id);
        return view('user.instructor.edit', $information);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string
     */
    public function update(UpdateRequest $request, $id)
    {
        $instructor = Instructor::query()->where('user_id', Auth::guard('web')->user()->id)->find($id);
        if ($request->hasFile('image')) {
            $imageName = Uploader::update_picture(Constant::WEBSITE_INSTRUCTOR_IMAGE, $request->file('image'), $instructor->image);
        }
        $instructor->update($request->except('image', 'description') + [
                'image' => $request->hasFile('image') ? $imageName : $instructor->image,
                'description' => Purifier::clean($request->description)
        ]);
        $request->session()->flash('success', 'Instructor updated successfully!');
        return "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $instructor = Instructor::query()->where('user_id', Auth::guard('web')->user()->id)->find($id);
        $courseCount = $instructor->courseList()->count();
        if ($courseCount > 0) {
            return redirect()->back()->with('warning', 'First delete all the courses of this instructor!');
        } else {
            Uploader::remove(Constant::WEBSITE_INSTRUCTOR_IMAGE, $instructor->image);
            $instructor->delete();
            return redirect()->back()->with('success', 'Instructor deleted successfully!');
        }
    }

    /**
     * Remove the selected resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function bulkDestroy(Request $request)
    {
        $ids = $request->ids;
        $errorOccured = false;

        foreach ($ids as $id) {
            $instructor = Instructor::where('user_id', Auth::guard('web')->user()->id)->find($id);
            $courseCount = $instructor->courseList()->count();
            if ($courseCount > 0) {
                $errorOccured = true;
                break;
            } else {
                Uploader::remove(Constant::WEBSITE_INSTRUCTOR_IMAGE, $instructor->image);
                $instructor->delete();
            }
        }

        if ($errorOccured == true) {
            $request->session()->flash('warning', 'First delete all the courses of those instructors!');
        } else {
            $request->session()->flash('success', 'Instructors deleted successfully!');
        }

        return "success";
    }


    public function getImageSection(Request $request)
    {
        $information['langs'] = Language::query()->where('user_id', Auth::guard('web')->user()->id)->get();
        $information['language'] = $information['langs']->where('code', $request->language)->first();
        $information['data'] = BasicSetting::where('user_id', Auth::guard('web')->user()->id)->select('instructor_bg_image', 'theme_version')->first();
        return view('user.home-page.instructor-section', $information);
    }

    public function updateImageSection(Request $request)
    {
        $data = BasicSetting::where('user_id', Auth::guard('web')->user()->id)->select('instructor_bg_image')->first();
        $rules = [];
        if (!$request->filled('image') && empty($data->instructor_bg_image)) {
            $rules['image'] = 'required';
        }
        if ($request->hasFile('image')) {
            $rules['image'] = new ImageMimeTypeRule();
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json(['errors' => $validator->errors()]);
        }
        if ($request->hasFile('image')) {
            
            $imgName = Uploader::update_picture(Constant::WEBSITE_INSTRUCTOR_IMAGE, $request->file('image'), $data->instructor_bg_image);
            // finally, store the image into db
            BasicSetting::query()->updateOrInsert(
                ['user_id' => Auth::guard('web')->user()->id],
                ['instructor_bg_image' => $imgName]
            );
            $request->session()->flash('success', 'Image updated successfully!');
        }
        return "success";
    }
}

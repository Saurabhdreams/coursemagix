<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Feature;
use Validator;
use Session;

class FeatureController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;
        $data['features'] = Feature::where('language_id', $lang_id)->orderBy('id', 'DESC')->get();
        $data['lang_id'] = $lang_id;

        return view('admin.home.feature.index', $data);
    }

    public function edit($id)
    {
        $data['feature'] = Feature::findOrFail($id);
        return view('admin.home.feature.edit', $data);
    }

    public function store(Request $request)
    {
        $img = $request->file('image');
        $allowedExts = array('jpg', 'png', 'jpeg');

        $messages = [
            'language_id.required' => 'The language field is required'
        ];

        $rules = [
            'language_id' => 'required',
            'image' => 'required',
            'title' => 'required|max:50',
            'text' => 'required|max:255',
            'serial_number' => 'required|integer',

            'image' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    if (!empty($img)) {
                        $ext = $img->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        if ($request->hasFile('image')) {
            $main_image = time() . '.' . $img->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/front/img/feature/'), $main_image);
            $image = $main_image;
        }else{
            $image = null;
        }


        $feature = new Feature;
        $feature->icon = $image;
        $feature->language_id = $request->language_id;
        $feature->title = $request->title;
        $feature->text = $request->text;
        $feature->serial_number = $request->serial_number;
        $feature->save();

        Session::flash('success', 'Feature added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $img = $request->file('image');
        $allowedExts = array('jpg', 'png', 'jpeg');
        $messages = [
            'language_id.required' => 'The language field is required'
        ];

        $rules = [
            'title' => 'required|max:50',
            'text' => 'required|max:255',
            'serial_number' => 'required|integer',
            'image' => 'required',
            'image' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    if (!empty($img)) {
                        $ext = $img->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],
        ];

        $request->validate($rules);

        $feature = Feature::findOrFail($request->feature_id);

        if ($request->hasFile('image')) {
            $main_image = time() . '.' . $img->getClientOriginalExtension();
            @unlink(public_path('assets/front/img/feature/' . $feature->icon));
            $request->file('image')->move(public_path('assets/front/img/feature/'), $main_image);
            $input['image'] = $main_image;
        }

        $feature->title = $request->title;
        $feature->text = $request->text;
        $feature->serial_number = $request->serial_number;
        $feature->icon = $request->hasFile('image') ? $main_image : $feature->icon;

        $feature->save();

        Session::flash('success', 'Feature updated successfully!');
        return back();
    }

    public function delete(Request $request)
    {

        $feature = Feature::findOrFail($request->feature_id);
        $feature->delete();

        Session::flash('success', 'Feature deleted successfully!');
        return back();
    }
}

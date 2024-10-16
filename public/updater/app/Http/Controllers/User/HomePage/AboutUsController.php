<?php

namespace App\Http\Controllers\User\HomePage;

use App\Constants\Constant;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Uploader;
use App\Models\User\HomePage\AboutUsSection;
use App\Models\User\Language;
use App\Models\User\UserAboutUsPoint;
use App\Rules\ImageMimeTypeRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
       
        $information['langs'] = Language::query()->where('user_id', Auth::guard('web')->user()->id)->get();
        $information['language'] = $information['langs']->where('code', $request->language)->first();
        $information['data'] = $information['language']->aboutUsSection()->first();
        $information['aboutPoints'] = UserAboutUsPoint::where('user_id',Auth::guard('web')->user()->id)->where('lang_id',$information['language']['id'])->get();
        return view('user.home-page.about-us-section', $information);
    }

    public function update(Request $request)
    {
        $language = Language::query()->where('user_id', Auth::guard('web')->user()->id)->where('code', $request->language)->first();
        $aboutUsInfo = $language->aboutUsSection()->first();
        $rules = [];

        if (empty($aboutUsInfo->image)) {
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
        // store data in db start
        if (empty($aboutUsInfo)) {
            $imageName = Uploader::upload_picture(Constant::WEBSITE_ABOUT_US_SECTION_IMAGE, $request->file('image'));
            AboutUsSection::create($request->except('language_id', 'image', 'user_id') + [
                    'language_id' => $language->id,
                    'image' => $imageName,
                    'user_id' => Auth::guard('web')->user()->id,
            ]);
            $request->session()->flash('success', 'Information added successfully!');
        } else {
            if ($request->hasFile('image')) {
                $imageName = Uploader::update_picture(Constant::WEBSITE_ABOUT_US_SECTION_IMAGE, $request->file('image'), $aboutUsInfo->image);
            }
            $aboutUsInfo->update($request->except('image') + [
                    'image' => $imageName ?? $aboutUsInfo->image
            ]);
            $request->session()->flash('success', 'Information updated successfully!');
        }
        return "success";
    }

    public function PointUpdate(Request $request)
    {
        $request->validate([
            'about_us_point_title' => 'required | max :190',
            'about_us_point_icon'  => 'required',
            'about_us_point_text'  =>'required',
            'serial_number' => 'required'
        ]);

        $point = UserAboutUsPoint::find($request->id);
        $point->icon  = $request->about_us_point_icon;
        $point->title = $request->about_us_point_title;
        $point->text  = $request->about_us_point_text;
        $point->serial_number  = $request->serial_number;
        $point->save();
        Session::flash('success','About Point Update Successfully !');

        return "success";

        
    }
    public function PointStore(Request $request)
    {
        $rules = [
            'user_language_id' => 'required',
            'about_us_point_title' => 'required | max :190',
            'about_us_point_icon'  => 'required',
            'about_us_point_text'  =>'required',
            'serial_number' => 'required'
        ];
        $validator =validator::make($request->all(),$rules);
        if($validator->fails()){
            $validator->getMessageBag()->add('error', 'true');
            return response()->json(['errors'=>$validator->errors()]);
        }

        $point = new UserAboutUsPoint();
        $point->lang_id = $request->user_language_id;
        $point->user_id = Auth::guard('web')->user()->id;
        $point->icon  = $request->about_us_point_icon;
        $point->title = $request->about_us_point_title;
        $point->text  = $request->about_us_point_text;
        $point->serial_number  = $request->serial_number;
        $point->save();
        Session::flash('success','About Point Created Successfully !');
        return "success";
    }

    public function PointDelete(Request $request)
    {
       $data = UserAboutUsPoint::where('user_id', Auth::guard('web')->user()->id)->find($request->id)->delete();
       if($data){
        $request->session()->flash('success', 'About Point Deleted Successfully !');
        return back();
       }

        $request->session()->flash('error', 'SomeThing went Wrong !');
        return back();

    }
    public function PointEdit(Request $request,$id)
    {
        $point = UserAboutUsPoint::find($id);
        return view('user.home-page.about-us-point.edit',compact('point'));
      
    }
    public function PointDeleteAll(Request $request)
    {
        $ids = $request->ids;
        if($ids){
            foreach ($ids as $id) {
                UserAboutUsPoint::where('user_id', Auth::guard('web')->user()->id)->find($id)->delete();
            }
        }else{
            $request->session()->flash('warning', 'No Item Selected!');
            return "success";

        }

        $request->session()->flash('success', 'About Point Deleted Successfully !');
        return "success";
    }

}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Models\Setting;
use Session;

class SettingController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $setting = Setting::first();
    return view('backend.pages.setting.index', compact('setting'));
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
    ]);

    if(Setting::first()){
      $setting = Setting::first();
      if(!is_null($request->logo)){
        if(!is_null($setting->logo)){
          $setting->logo = ImageUploadHelper::update('logo', $request->file('logo'), time(), 'public/images/settings', $setting->logo);
        }
        else{
          $setting->logo = ImageUploadHelper::upload('logo', $request->file('logo'), time(), 'public/images/settings');
        }
      }

      if(!is_null($request->favicon)){
        if(!is_null($setting->favicon)){
          $setting->favicon = ImageUploadHelper::update('favicon', $request->file('favicon'), time().'1', 'public/images/settings', $setting->favicon);
        }
        else{
          $setting->favicon = ImageUploadHelper::upload('favicon', $request->file('favicon'), time().'1', 'public/images/settings');
        }
      }
    }
    else{
      $setting = new Setting();
      $setting->logo = ImageUploadHelper::upload('logo', $request->file('logo'), time(), 'public/images/settings');
      $setting->favicon = ImageUploadHelper::upload('favicon', $request->file('favicon'), time().'1', 'public/images/settings');
    }

    $setting->title = $request->title;
    $setting->save();

    session()->flash('success', 'Setting information updated successfully');
    return redirect()->route('admin.setting.index');
  }
}

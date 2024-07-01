<?php

namespace App\Http\Controllers\Admin\Settings;

use App\User;
use App\WebsiteSetting;
use Illuminate\Http\Request;
use App\Http\Helpers\Admin\Setting;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(['auth','admin']);
    }

    public function AdminSettings()
    {
    	return view('Admin.Dashboard.Settings.index');
    }

    public function AdminBasicInformation()
    {
        return view('Admin.Dashboard.Settings.BasicInformation.index');
    }
    public function AdminSaveBasicInformation(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $rules = [
            'email.email' => 'Please Enter a Valid Email',
            'phone.numeric' => 'Phone must be a Number',
        ];
        $request->validate([
        'name' => ['required', 'string'],
        'email' => ['required', 'email','unique:users,email,'.$user->id,],
        'phone' => ['required', 'numeric'],
        'address' => ['required', 'string'],
        ],$rules);

        if ($user->role_id === 1) {
            if ($user->type === "Admin") {
                $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                ];
                if($user->update($data)){
                    return back()->with('success','Basic Information has been Updated Successfully!');
                }else{
                return back()->with('error','Something Went Wrong! Please Try again Later.');
                }
            }else{
                return back()->with('error','Something Went Wrong!');
            }
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function AdminProfilePicture()
    {
        return view('Admin.Dashboard.Settings.ProfilePicture.index');
    }
    public function AdminSaveProfilePicture(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $rules = [
            'profile_picture.mimes' => 'Image Should be JPG,JPEG Or PNG',
        ];
        $request->validate([
        'profile_picture' => ['nullable','mimes:jpg,jpeg,png'],
        ],$rules);
        if ($user->role_id === 1) {
            if ($user->type === "Admin") {
                if (!is_null($request->profile_picture)) {
                    $profile_picture = sha1(Auth::user()->id).'-'.date('d-m-Y').'.'.$request->profile_picture->extension();

                    $request->profile_picture->move(public_path('Users/profile_pictures'), $profile_picture);
                    $data = [
                    'user_image' => $profile_picture,
                    ];
                    if($user->update($data)){
                        return back()->with('success','Profile Picture has been Updated Successfully!');
                    }else{
                    return back()->with('error','Something Went Wrong! Please Try again Later.');
                    }
                }else{
                    return back()->with('success','You did not Select any Image');
                }
            }else{
                return back()->with('error','Something Went Wrong!');
            }
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function AdminRemoveProfilePicture()
    {
        $user = User::findOrFail(Auth::user()->id);
        if ($user->role_id === 1) {
            if ($user->type === "Admin") {
                if($user->update(['user_image' => null])){
                    return back()->with('success','Profile Picture has been Removed Successfully!');
                }else{
                return back()->with('error','Something Went Wrong! Please Try again Later.');
                }
            }else{
                return back()->with('error','Something Went Wrong!');
            }
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function AdminSecurity()
    {
        return view('Admin.Dashboard.Settings.Security.index');
    }

    public function AdminSavePassword(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $rules = [
            'password.min' => 'Password Should be Minimum 8 Characters Long.',
            'password.confirmed' => 'Confirm Password Did not Match.',
        ];

        $request->validate([
        'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ],$rules);

        if ($user->role_id === 1) {
            if ($user->type === "Admin") {
                if (!is_null($request->password)) {
                    if($user->update(['password' => bcrypt($request->password)])){
                        return back()->with('success','Password has been Changed Successfully!');
                    }else{
                    return back()->with('error','Something Went Wrong!');
                    }
                }else{
                    return back()->with('success','You Did Not Enter Any Password');
                }
            }else{
                return back()->with('error','Something Went Wrong!');
            }
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }


    public function WebsiteInformation()
    {
        $siteinfo = Setting::Website();
        return view('Admin.Dashboard.Settings.WebsiteInformation.index',compact('siteinfo'));
    }


    public function SaveWebsiteInformation (Request $request)
    {
        $rules = [
            'text_logo.sometimes' => "Write a name for your Website",
            'email.sometimes' => "Write an Email for your Website",
        ];

        $validate = $request->validate([
            'text_logo' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email'],
            'phone' => ['sometimes', 'numeric'],
            'address' => ['sometimes', 'string'],

        ],$rules);  
        $data = [
            'text_logo' => $request->text_logo,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        if ($siteinfo = Setting::Website()) {
            if ($siteinfo->update($data)) {
                return back()->with('success','Information Updated Successfully!');
            }else{
                return back()->with('error','Something Went Wrong!');
            }
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }
}

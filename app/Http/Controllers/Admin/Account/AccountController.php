<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(['auth','admin']);
    }

	public function AdminAccountSettings()
	{
		return view('Admin.Dashboard.Account.EditAccount');
	}

	public function AdminUpdateAccount(Request $request)
	{

        $rules = [
            'password.confirmed' => 'Confirm Password does not match',
            'profile_picture.mimes' => 'Image should be JPG,JPEG or PNG',
        ];

        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id],

            'profile_picture' => ['nullable','image','mimes:jpg,jpeg,png'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],

        ],$rules);  

        if (!is_null($user = User::find(Auth::user()->id))) {

        	if ($user->role_id == 1) {

	        	if ($user->type == "Admin") {
	        		
	        	if (Auth::user()->id == $user->id) {

	        		if (!is_null($request->password)) {

	        			$password = bcrypt($request->password);

	        		}else{

	        			$password = $user->password;

	        		}

	        		if (!is_null($request->profile_picture)) {

	        			$profile_picture = time().'.'.md5(Auth::user()->id).'.'.$request->profile_picture->extension();

	        			$request->profile_picture->move(public_path('Users/profile_pictures'), $profile_picture);

	        		}else{

	        			$profile_picture = $user->user_image;

	        		}

	        		$data = [

	        			'name' => $request->name,
	        			'email' => $request->email,
	        			'password' => $password,
	        			'user_image' => $profile_picture,
	        		];

	        		if ($user->update($data)) {

	        			return back()->with('success','Profile Updated Successfully!');

	        		}else{

					return back()->with('error','Something Went Wrong!');

				}

	        	}else{

				return back()->with('error','Something Went Wrong!');

				}

	        	}else{

				return back()->with('error','Something Went Wrong!');

				}

        	}else{

			return back()->with('error','Something Went Wrong!');

			}

        }else{
			return back()->with('error','Something Went Wrong!');
		}
	}
}

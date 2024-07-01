<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ReaderAccountController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(['auth','reader']);
    }

	public function Account()
	{
		return view('Reader.Dashboard.Account.EditAccount');
	}

	public static function IsValidReader($user)
	{
		if (!is_null($reader = User::find($user))) {
			if ($reader->role_id === 3) {
				if ($reader->type === "Reader") {
					return $reader;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function RemoveAvatar($id)
	{
        $user = User::findOrFail($id);
        if ($user = self::IsValidReader($user->id)) {
	        if (Auth::user()->id == $user->id) {
	        	if ($user->update(['user_image' => null])) {
	        			return back()->with('success','Profile Picture Removed Successfully!');
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

	public function UpdateAccount(Request $request, $id)
	{
        $rules = [
            'password.confirmed' => 'Confirm Password does not match',
            'profile_picture.mimes' => 'Image should be JPG,JPEG or PNG',
        ];
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id],
            'phone' => ['required', 'string', 'max:255', 'unique:users,phone,'.Auth::user()->id],
            'date_of_birth' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'school_name' => ['required', 'string', 'max:255'],
            'course' => ['required', 'string', 'max:255'],
            'school_address' => ['required', 'string', 'max:255'],
            'profile_picture' => ['nullable','image','mimes:jpg,jpeg,png'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ],$rules);  
        $user = User::findOrFail($id);
        if ($user = self::IsValidReader($user->id)) {
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
	        			'phone' => $request->phone,
	        			'date_of_birth' => $request->date_of_birth,
	        			'address' => $request->address,
	        			'place_of_birth' => $request->place_of_birth,
	        			'school_name' => $request->school_name,
	        			'course' => $request->course,
	        			'school_address' => $request->school_address,
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
	}
}

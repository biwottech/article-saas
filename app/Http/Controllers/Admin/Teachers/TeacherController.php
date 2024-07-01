<?php
namespace App\Http\Controllers\Admin\Teachers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Helpers\Admin\Teacher;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
	public function Teachers()
	{
        $paginate = 5;
        $users = User::withTrashed();
        $queries = [];
        if (request('search')) {
            $users = $users->where('name','LIKE','%'.request('search').'%')
            ->orWhere('email','LIKE','%'.request('search').'%')
            ->orWhere('phone','LIKE','%'.request('search').'%')
            ->orWhere('place_of_birth','LIKE','%'.request('search').'%')
            ->orWhere('country','LIKE','%'.request('search').'%')
            ->orWhere('school_name','LIKE','%'.request('search').'%');
            $queries['search'] = request('search');
        }

        //Show Teachers in Paginate
        if (request('show')) {
            $paginate = intval(request('show'));
            $queries['show'] = request('show');
        }

        //Teachers are Active Or Blocked
        if (request('status')) {
        	//dd(request('status'));
        	if (request('status')=="active") {
        		$users = new User;
        		$queries['status'] = request('status');
        	}
        	if (request('status')=="blocked") {
        		$users = User::onlyTrashed();
        		$queries['status'] = request('status');
        	}
        }
        $users = $users->where('role_id',3)->where('type','Reader')
        		 ->paginate($paginate)->appends($queries);
		return view('Admin.Dashboard.Teachers.index',compact('users'));
	}

	public function ViewTeacher($id)
	{
		if ($teacher = Teacher::FindSpecific($id)) {
			return view('Admin.Dashboard.Teachers.Edit.index',compact('teacher'));
		}else{
			return back()->with('error','Something Went Wrong!');	
		}
	}

	public function ViewTeacherProfilePicture($id)
	{
		if ($teacher = Teacher::FindSpecific($id)) {
			return view('Admin.Dashboard.Teachers.Edit.ProfilePicture.index',compact('teacher'));	
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function UpdateTeacherProfilePicture(Request $request,$id)
	{
        $user = User::findOrFail($id);
        $rules = [
            'profile_picture.mimes' => 'Image Should be JPG,JPEG Or PNG',
        ];
        $request->validate([
        'profile_picture' => ['nullable','mimes:jpg,jpeg,png'],
        ],$rules);
        if (!is_null($request->profile_picture)) {
            $profile_picture = sha1($user->id).'-'.date('d-m-Y').'.'.$request->profile_picture->extension();

            $request->profile_picture->move(public_path('Users/profile_pictures'), $profile_picture);
            $data = [
            'user_image' => $profile_picture,
            ];
            if ($teacher = Teacher::FindSpecific($user->id)) {
	            if($teacher->update($data)){
	                return back()->with('success','Profile Picture has been Updated Successfully!');
	            }else{
	            return back()->with('error','Something Went Wrong! Please Try again Later.');
	            }
            }else{
            	return back()->with('error','Something Went Wrong! Please Try again Later.');
            }
        }else{
            return back()->with('success','You did not Select any Image');
        }
	}

    public function RemoveTeacherProfilePicture ($id)
    {
        $user = User::findOrFail($id);
        if ($teacher = Teacher::FindSpecific($user->id)) {
	        if($teacher->update(['user_image' => null])){
	            return back()->with('success','Profile Picture has been Removed Successfully!');
	        }else{
	        	return back()->with('error','Something Went Wrong! Please Try again Later.');
	        }
        }else{
        	return back()->with('error','Something Went Wrong! Please Try again Later.');
        }
    }

	public function ViewTeacherBasicInformation ($id)
	{
		if ($teacher = Teacher::FindSpecific($id)) {
			return view('Admin.Dashboard.Teachers.Edit.BasicInformation.index',compact('teacher'));	
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function UpdateTeacherBasicInformation (Request $request,$id)
	{
        $user = User::findOrFail($id);
        $rules = [
            'email.email' => 'Please Enter a Valid Email',
            'email.unique' => 'The email '.$request->email.' is already in use.',
            'phone.numeric' => 'Phone must be a Number',
        ];
        $request->validate([
        'name' => ['required', 'string'],
        'email' => ['required', 'email','unique:users,email,'.$user->id,],
        'phone' => ['required', 'numeric'],
        'address' => ['required', 'string'],
        'school_name' => ['required', 'string'],
        'school_address' => ['nullable', 'string'],
        'course' => ['nullable', 'string'],
        ],$rules);

        $data = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'school_name' => $request->school_name,
        'school_address' => $request->school_address,
        'course' => $request->course,
        ];

		if ($teacher = Teacher::FindSpecific($user->id)) {
            if($teacher->update($data)){
                return back()->with('success','Basic Information has been Updated Successfully!');
            }else{
             return back()->with('error','Something Went Wrong!');
            }
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function EditTeacherPassword($id)
	{
		if ($teacher = Teacher::FindSpecific($id)) {
			return view('Admin.Dashboard.Teachers.Edit.Security.index',compact('teacher'));	
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function UpdateTeacherPassword(Request $request,$id)
	{
        $user = User::findOrFail($id);
        $rules = [
            'password.min' => 'Password should be minimum 8 characters long.',
            'password.confirmed' => 'Confirm Password did not match.',
        ];
        $request->validate([
        'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ],$rules);

		if ($teacher = Teacher::FindSpecific($user->id)) {
            if (!is_null($request->password)) {
                if($teacher->update(['password' => bcrypt($request->password)])){
                    return back()->with('success','Password has been Changed Successfully!');
                }else{
                	return back()->with('error','Something Went Wrong!');
                }
            }else{
                return back()->with('success','You did not enter any Password');
            }
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function BlockTeacher($id)
	{
		if ($teacher = Teacher::FindSpecific($id)) {
			if ($teacher->delete()) {
				return back()->with('success','Blocked Successfully!');	
			}else{
				return back()->with('error','Something Went Wrong!');	
			}
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function RestoreTeacher($id)
	{
		if ($teacher = Teacher::FindSpecific($id)) {
			if ($teacher->restore()) {
				return back()->with('success','Restored Successfully!');	
			}else{
				return back()->with('error','Something Went Wrong!');	
			}
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function DeleteTeacher($id)
	{
		if ($teacher = Teacher::FindSpecific($id)) {
			if ($teacher->forceDelete()) {
				return redirect()
					   ->route('AdminTeachers')
					   ->with('success','Deleted Permanently!');	
			}else{
				return back()->with('error','Something Went Wrong!');	
			}
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}
}

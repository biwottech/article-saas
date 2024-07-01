<?php

namespace App\Http\Controllers\Admin\Students;

use App\User;
use App\Article;
use App\AgeGroup;
use App\Competetion;
use App\PlanSubscription;
use Illuminate\Http\Request;
use App\StudentPaypalAccount;
use App\Http\Helpers\Admin\Student;
use App\Http\Helpers\Writer\Writer;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Admin\AgeGroup as AgeGroupHelper;

class StudentController extends Controller
{
	public function Students()
	{
        $paginate = 5;
        $users = User::withTrashed();
        $age_groups = AgeGroupHelper::All();
        $queries = [];
        if (request('search')) {
            $users = $users->where('name','LIKE','%'.request('search').'%')
            ->orWhere('email','LIKE','%'.request('search').'%')
            ->orWhere('phone','LIKE','%'.request('search').'%')
            ->orWhere('place_of_birth','LIKE','%'.request('search').'%')
            ->orWhere('country','LIKE','%'.request('search').'%')
            ->orWhere('address','LIKE','%'.request('search').'%')
            ->orWhere('mother_name','LIKE','%'.request('search').'%')
            ->orWhere('father_name','LIKE','%'.request('search').'%')
            ->orWhere('school_name','LIKE','%'.request('search').'%');
            $queries['search'] = request('search');
        }
        //Show Students in Paginate
        if (request('show')) {
            $paginate = intval(request('show'));
            $queries['show'] = request('show');
        }

        //Show Students Age Groups
        if (request('age_group')) {
        	$int = preg_replace('/[^0-9]/', ',', request('age_group'));  
        	$group_from = explode(',', $int)[0];
        	$group_to = explode(',', $int)[1];
        	$age_group = $age_groups->where('group_from',intval($group_from))->first();
        	$users = User::withTrashed()->where('age_group_id',$age_group->id);
            $queries['age_group'] = request('age_group');
        }
        //Student are Active Or Blocked
        if (request('status')) {
        	//dd(request('status'));
        	if (request('status')=="ActiveStudents") {
        		$users = new User;
        		$queries['status'] = request('status');
        	}
        	if (request('status')=="BlockedStudents") {
        		$users = User::onlyTrashed();
        		$queries['status'] = request('status');
        	}
        }
        $users = $users->where('role_id',2)->where('type','Writer')
        		 ->paginate($paginate)->appends($queries);
		return view('Admin.Dashboard.Students.index',compact('users'));
	}

	public function ViewStudent($id)
	{
		$user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user)) {
			return view('Admin.Dashboard.Students.Edit.index',compact('student'));
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function BlockStudent($id)
	{	
		$user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user)) {
			if ($student->delete()) {
				return back()->with('success','Blocked Successfully!');	
			}else{
				return back()->with('error','Something Went Wrong!');	
			}
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function RestoreStudent($id)
	{
		$user = User::withTrashed()->findOrFail($id);
		if ($student = Student::FindSpecific($user)) {
			if ($student->restore()) {
				return back()->with('success','Restored Successfully!');	
			}else{
				return back()->with('error','Something Went Wrong!');	
			}
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function DeleteStudent($id)
	{
		$user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user)) {
			if ($student->forceDelete()) {
				return back()->with('success','Deleted Permanently!');	
			}else{
				return back()->with('error','Something Went Wrong!');	
			}
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function ViewStudentProfilePicture($id)
	{
		$user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user)) {
			return view('Admin.Dashboard.Students.Edit.ProfilePicture.index',compact('student'));
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function UpdateStudentProfilePicture (Request $request,$id)
	{
		$user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user)) {
        $rules = [
            'profile_picture.mimes' => 'Image Should be JPG,JPEG Or PNG',
        ];
        $request->validate([
        'profile_picture' => ['nullable','mimes:jpg,jpeg,png'],
        ],$rules);
        if (!is_null($request->profile_picture)) {
            $profile_picture = sha1($user->id).'-'.date('d-m-Y').'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('Users/profile_pictures'), $profile_picture);
	      	if($student->update(['user_image' => $profile_picture])){
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
	}

	public function RemoveStudentProfilePicture(Request $request,$id)
	{
		$user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user)) {
	      	if($student->update(['user_image' => null])){
	          	return back()->with('success','Profile Picture has been Updated Successfully!');
	      	}else{
	      		return back()->with('error','Something Went Wrong! Please Try again Later.');
	      	}
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function ViewStudentBasicInformation($id)
	{
		$user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user)) {
			return view('Admin.Dashboard.Students.Edit.BasicInformation.index',compact('student'));	
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function UpdateStudentBasicInformation(Request $request,$id)
	{
		$user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user)) {
			$request->validate([
				'name' => 'required|string',
				'email' => 'required|email|unique:users,email,'.$user->id,
				'phone' => 'required|unique:users,phone,'.$user->id,
				'address' => 'required|string',
			]);
			$data = [
				'name' => $request->name,
				'email' => $request->email,
				'phone' => $request->phone,
				'address' => $request->address,
			];
			if ($user->update($data)) {
				return back()->with('success','Updated Successfully!');
			}else{
				return back()->with('error','Something Went Wrong!');
			}
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function EditStudentPassword($id)
	{
		$user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user)) {
			return view('Admin.Dashboard.Students.Edit.Security.index',compact('student'));	
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function UpdateStudentPassword(Request $request,$id)
	{
        $user = User::findOrFail($id);
        $rules = [
            'password.min' => 'Password Should be Minimum 8 Characters Long.',
            'password.confirmed' => 'Confirm Password Did not Match.',
        ];
        $request->validate([
        'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ],$rules);
		if ($student = Student::FindSpecific($user->id)) {
            if (!is_null($request->password)) {
                if($student->update(['password' => bcrypt($request->password)])){
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
	}

	public function ViewStudentPaypalAccounts($id)
	{
        $user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user->id)) {
			$accounts = Student::PaypalAccounts($user->id); 
			return view('Admin.Dashboard.Students.Edit.PaypalAccounts.index')
				   ->with([
				   	'student' => $student,
				   	'accounts' => $accounts,
				   ]);	
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function AddStudentPaypalAccount(Request $request ,$id)
	{
        $user = User::findOrFail($id);
        $rules = [
            'account_name.required' => 'Enter Name from Account',
            'account_email.required' => 'Enter PaypalAccount ID',
            'account_email.unique' => 'The Account '.$request->account_email.' is already in use.',
        ];
        $request->validate([
            'account_name' => 'required|string',
            'account_email' => 'required|string|unique:student_paypal_accounts,email',
        ],$rules);

		if ($student = Student::FindSpecific($user->id)) {
			$data = [
				'user_id' => $user->id,	
				'account_name' => $request->account_name,
				'email' => $request->account_email,
			];
			if (StudentPaypalAccount::create($data)){
				return back()->with('success','Paypal Account has been Added Successfully!');
			}else{
				return back()->with('error','Something Went Wrong!');
			}
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function UpdateStudentPaypalAccount(Request $request ,$id)
	{
        $account = StudentPaypalAccount::findOrFail($id);
        $rules = [
            'account_name.required' => 'Enter Name from Account',
            'account_email.required' => 'Enter PaypalAccount ID',
            'account_email.unique' => 'The Account '.$request->account_email.' Belongs to another User',
        ];
        $request->validate([
            'account_name' => 'required|string',
            'account_email' => 'required|string|unique:student_paypal_accounts,email,'.$account->id,
        ],$rules);

		if ($paypalaccount = Student::SpecificPaypalAccount($account->id)) {
			$data = [
				'account_name' => $request->account_name,
				'email' => $request->account_email,
			];
			if ($paypalaccount->update($data)){
				return back()->with('success','Paypal Account has been Updated Successfully!');
			}else{
				return back()->with('error','Something Went Wrong!');
			}
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function DeleteStudentPaypalAccount($id)
	{
        $account = StudentPaypalAccount::findOrFail($id);
		if ($paypalaccount = Student::SpecificPaypalAccount($account->id)) {
			if ($paypalaccount->delete()){
				return back()->with('success','Paypal Account has been Deleted Successfully!');
			}else{
				return back()->with('error','Something Went Wrong!');
			}
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function StudentGroups($id)
	{	
		$age_group = AgeGroup::findOrFail($id);
		$users = AgeGroupHelper::TotalStudentsInSpecific($age_group->id);
		return view('Admin.Dashboard.AgeGroups.Students.index')
			   ->with([
				'age_group' => $age_group,
				'users' => $users,
			   ]);
	}

	public function ViewStudentArticles ($id)
	{
        $user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user->id)) {
        $articles = Article::withTrashed();
        $paginate = 5;
        $columns = ['status','visibility'];
        $queries = [];
        if (request('search')) {
            $articles = $articles->where('title','%LIKE%',request('search'))
            ->orWhere('content','%LIKE%',request('search'));
            $queries['search'] = request('search');
        }
        //Show More than 5 Per Page
        if (request('show')) {
            $paginate = intval(request('show'));
            $queries['show'] = request('show');
        }

        foreach ($columns as $column) {
            if (request($column)){
                $articles = $articles->where($column,strtoupper(request($column)));
                $queries[$column] = request($column);
            }
        }
        	$articles = $articles->where('user_id',$student->id)->paginate($paginate)->appends($queries);
			return view('Admin.Dashboard.Students.Articles.index')
				   ->with([
				   	'student' => $student,
				   	'articles' => $articles,
				   ]);	
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function ViewStudentCompetetions($id)
	{
        $user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user->id)) {
			$student_competetions = Student::Competetions($student->id);
			if ($student_competetions) {
				$competetions = Competetion::whereIn('id',$student_competetions);
			}else{
				$competetions = false;
			}
	        $paginate = 5;
	        $columns = ['status','result_status'];
	        $queries = [];
	        if (request('search_competetion')) {
	            $competetions = $competetions->where('name','LIKE','%'.request('search_competetion').'%')
	            ->orWhere('status','%LIKE%','%'.request('search_competetion').'%');
	            $queries['search_competetion'] = request('search_competetion');
	        }
	        if (request('show')) {
	            $paginate = intval(request('show'));
	            $queries['show'] = request('show');
	        }
	        foreach ($columns as $column) {
	            if (request($column)){
	                $competetions = $competetions->where($column,strtoupper(request($column)));
	                $queries[$column] = request($column);
	            }
	        }
	        if ($student_competetions) {
				$competetions = $competetions->paginate($paginate)->appends($queries);
			}else{
				$competetions = false;
			}
			return view('Admin.Dashboard.Students.Competetions.index')
				   ->with([
				   	'student' => $student,
				   	'competetions' => $competetions,
				   ]);	
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function ViewStudentSubscriptions($id)
	{
		$user = User::findOrFail($id);
		if ($student = Student::FindSpecific($user->id)) {
			$subscriptions = Writer::Subscriptions($student->id);
			return view('Admin.Dashboard.Students.Subscriptions.index')
			->with([
				'student' => $student,
				'subscriptions' => $subscriptions,
			]);
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function DeleteStudentSubscription($subscription)
	{
		$subscription = PlanSubscription::findOrFail($subscription);
		if ($subscription->delete()) {
			return back()->with('success','Subscription Deleted Successfully!');
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function CancelStudentSubscription($subscription)
	{
		$subscription = PlanSubscription::findOrFail($subscription);
		if (Writer::CancelSubscription($subscription->user_id,$subscription->plan_id)) {
			return back()->with('success','Subscription Canceled Successfully!');
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function ResumeStudentSubscription($subscription)
	{
		$subscription = PlanSubscription::findOrFail($subscription);
		if (Writer::ResumeSubscription($subscription->user_id,$subscription->plan_id)) {
			return back()->with('success','Subscription Resumed Successfully!');
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}
}

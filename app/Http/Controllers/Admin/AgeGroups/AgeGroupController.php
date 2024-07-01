<?php

namespace App\Http\Controllers\Admin\AgeGroups;

use App\User;
use App\Country;
use App\Article;
use App\AgeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Admin\AgeGroup as AgeGroupHelper;

class AgeGroupController extends Controller
{

    public function __construct()
    {
    	return $this->middleware(['auth','admin']);
    }
	
	public function StudentAgeGroups()
	{
		$age_groups = new AgeGroup;
		$paginate = 5;
		$queries = [];
		if (request('show')) {
			$paginate = request('show');
			$queries['show'] = request('show');
		}
		if (request('search')) {
			$age_groups = $age_groups->where('group_from','LIKE','%'.request('search').'%')
            ->orWhere('group_to','LIKE','%'.request('search').'%')
            ->orWhere('description','LIKE','%'.request('search').'%');
			$queries['search'] = request('search');
		}
		$age_groups = $age_groups->paginate($paginate)->appends($queries);
		return view('Admin.Dashboard.AgeGroups.index',compact('age_groups'));
	}

	public function StudentGroups($id)
	{
		$age_group = AgeGroup::findOrFail($id);
		$users = User::where('age_group_id',$age_group->id);
        $paginate = 5;
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

        //Student are Active Or Blocked
        if (request('status')) {
        	//dd(request('status'));
        	if (request('status')=="active") {
        		$users = $users;
        		$queries['status'] = request('status');
        	}
        	if (request('status')=="blocked") {
        		$users = $users->onlyTrashed();
        		$queries['status'] = request('status');
        	}
        }

        $users = $users->paginate($paginate)->appends($queries);
		return view('Admin.Dashboard.AgeGroups.Students.index')
			   ->with([
				'age_group' => $age_group,
				'users' => $users,
			   ]);
	}

	public function CreateAgeGroup()
	{
		return view('Admin.Dashboard.AgeGroups.Create.index');
	}

	public function SaveAgeGroup(Request $request)
	{
		$rules = [
			'group_to.gt' => "Group To Should be Greator Than Group From",
		];

		$request->validate([
			'group_from' => 'required|numeric|unique:age_group',
			'group_to' => 'required|numeric|unique:age_group|gt:group_from',
			'description' => 'required|string|unique:age_group',
		],$rules);

		if (AgeGroup::create($request->all())) {
			return redirect()->route('AdminStudentAgeGroups')->with('success','AgeGroup Created Successfully');
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function EditAgeGroup($id)
	{
		$age_group = AgeGroup::findOrFail($id);
		return view('Admin.Dashboard.AgeGroups.Update.index',compact('age_group'));
	}

	public function UpdateAgeGroup(Request $request,$id)
	{
		$age_group = AgeGroup::findOrFail($id);
		$rules = [
			'group_to.gt' => "Group To Should be Greator Than Group From",
		];
		$request->validate([
			'group_from' => 'required|numeric|unique:age_group,group_from,'.$age_group->id,
			'group_to' => 'required|numeric|gt:group_from|unique:age_group,group_to,'.$id,
			'description' => 'required|string|unique:age_group,description,'.$age_group->id,
		],$rules);
		
		if ($age_group->update($request->all())) {
			return back()->with('success','Successfully Updated');
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}

	public function AdminDeleteAgeGroup($id)
	{
		$age_group = AgeGroup::findOrFail($id);
		if ($age_group->delete()) {
			return back()->with('success','Successfully Deleted');
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}
}

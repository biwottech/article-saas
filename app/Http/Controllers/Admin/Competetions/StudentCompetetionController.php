<?php
namespace App\Http\Controllers\Admin\Competetions;

use App\User;
use App\AgeGroup;
use App\Competetion;
use App\WebsiteSetting;
use App\CompetetionSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Admin\AgeGroup as AgeGroupHelper;
use App\Http\Helpers\Admin\Competetion as CompetetionHelper;

class StudentCompetetionController extends Controller
{

    public function __construct()
    {
    	return $this->middleware(['auth','admin']);
    }


    public function CompetetionsDashboard(Request $request)
    {
        $competetions = new Competetion;
        $paginate = 5;
        $columns = ['status','result_status'];
        $queries = [];
        if (request('search_competetion')) {
            $competetions = $competetions->where('name','LIKE','%'.request('search_competetion').'%')
            ->orWhere('status','LIKE','%'.request('search_competetion').'%');
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
        $competetions = $competetions->paginate($paginate)->appends($queries);
        return view('Admin.Dashboard.Competetions.index',compact('competetions'));
    }

    public function CreateCompetetion()
    {
		return view('Admin.Dashboard.Competetions.Create.index');
    }

    public function SaveCompetetionInfo(Request $request)
    {
    	$rules= [
    			'starting_date.date' => "Please Select a Valid Date",
                'status.in' => "Status should be Initializing Or Start Now",
                'starting_date.after' => "Starting Date should not be older than Today.",
    			'ending_date.date' => "Please Select a Valid Date",
    			];

    	$request->validate([
            'name' => 'required|string',
            'status' => 'required|in:STARTED,INITIALIZING',
    		'starting_date' => 'required|date|date_format:Y-m-d|after_or_equal:'.date('Y-m-d'),
    		'ending_date' => 'required|date|date_format:Y-m-d|after:starting_date',
    		'description' => 'nullable|string',
            'guides' => 'nullable|string',
    	],$rules);

    	$data = [
    		'name' => $request->name,
            'status' => $request->status,
    		'starting_date' => $request->starting_date,
    		'ending_date' => $request->ending_date,
    		'description' => $request->description,
            'guide_lines' => $request->guides,
    	];
    	if (Competetion::create($data)){
		    return redirect()->route('AdminCompetetionsDashboard')->with('success','Competetion Created Successfully');
    	}else{
    		return back()->with('error','Something Went Wrong!');
    	}
    }

    public function EditCompetetion($id)
    {
    	$competetion = Competetion::findOrFail($id);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        if (CompetetionHelper::IsEnded($competetion->id)) {
            return back()->with('error','Competetion has been Ended Already!');
        }else{
        return view('Admin.Dashboard.Competetions.Update.index',compact('competetion'));
        }
    }

    public function UpdateCompetetion(Request $request,$id)
    {
    	$rules= [
    			'starting_date.date' => "Please Select a Valid Date",
    			'ending_date.date' => "Please Select a Valid Date",
    			];

    	$request->validate([
            'name' => 'required|string',
    		'starting_date' => 'required|date|date_format:Y-m-d|after_or_equal:'.date('Y-m-d'),
    		'ending_date' => 'required|date|date_format:Y-m-d|after:starting_date',
    		'description' => 'nullable|string',
            'guides' => 'required|string',
    	],$rules);

    	$data = [
            'name' => $request->name,
            'starting_date' => $request->starting_date,
            'ending_date' => $request->ending_date,
            'description' => $request->description,
            'guide_lines' => $request->guides,
    	];

    	$competetion = Competetion::findOrFail($id);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        if (!CompetetionHelper::IsEnded($competetion->id)) {
            if ($competetion->update($data)) {
            return back()->with('success','Competetion Updated Successfully');
            }else{
                return back()->with('error','Something Went Wrong!');
            }
        }else{
           return back()->with('error','Competetion was Ended!.You can not Update it!'); 
        }
    }

     public function DeleteCompetetion($id)
    {
    	$competetion = Competetion::findOrFail($id);

    	if ($competetion->status !== "STARTED") {

		if ($competetion->delete()) {

		return redirect()->route('AdminCompetetionsDashboard')->with('success','Successfully Deleted');

    	}else{

    		return back()->with('error','Something Went Wrong!');
    	}

    	}else{

    		return back()->with('error','Competetion is already Started.Cancel it OR End it first then you can Delete it!');
    	}
    }

    public function AdminSaveCompetetion($id,Request $request)
    {

    $rules = ['to.after' => "To Date should be any date After From Date"];

       $request->validate([
        'quantity' => 'required|numeric',
        'from' => 'required|date',
        'to' => 'required:date|after:from',
       ],$rules);

       $settings = WebsiteSetting::findOrFail($id);

       if (!is_null($settings)) {

        $data = [

            'quantity' => $request->quantity,
            'from' => $request->from,
            'to' => $request->to,

            ];

            if ($settings->update($data)) {

                 return back()->with('success','Information Updated Successfully!');

            }else{

                return back()->with('error','Something Went Wrong!');

            }
       }

    }

    public function ViewCompetetion($id)
    {
        $competetion = Competetion::findOrFail($id);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        return view('Admin.Dashboard.Competetions.View.index',compact('competetion'));
    }

    public function Participants($id)
    {
        $competetion = Competetion::findOrFail($id);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $participants = CompetetionHelper::TotalParticipants($competetion->id);
        $paginate = 5;
        $age_groups = AgeGroupHelper::All();
        $queries = [];
        if (request('search')) {
            $participants = $participants->where('name','LIKE','%'.request('search').'%')
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
            $participants = $participants->where('age_group_id',$age_group->id);
            $queries['age_group'] = request('age_group');
        }
        //Student are Active Or Blocked
        if (request('status')) {
            //dd(request('status'));
            if (request('status')=="ActiveStudents") {
                $participants = new User;
                $queries['status'] = request('status');
            }
            if (request('status')=="BlockedStudents") {
                $participants = User::onlyTrashed();
                $queries['status'] = request('status');
            }
        }
        $participants = $participants->paginate($paginate)->appends($queries);
        return view('Admin.Dashboard.Competetions.View.Participants.index')
               ->with([
                'competetion' => $competetion,
                'participants' => $participants,
               ]);
    }

    public function AgeGroups($id)
    {
        $competetion = Competetion::findOrFail($id);
        $agegroups = CompetetionHelper::TotalAgeGroups($competetion->id);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $paginate = 5;
        $queries = [];
        if (request('show')) {
            $paginate = request('show');
            $queries['show'] = request('show');
        }
        if (request('search')) {
            $agegroups = $agegroups->where('group_from','LIKE','%'.request('search').'%')
            ->orWhere('group_to','LIKE','%'.request('search').'%')
            ->orWhere('description','LIKE','%'.request('search').'%');
            $queries['search'] = request('search');
        }
        if ($agegroups) {
            $agegroups = $agegroups->paginate($paginate)->appends($queries);
        }else{
            $agegroups = null;
        }
        return view('Admin.Dashboard.Competetions.View.AgeGroups.index')
               ->with([
                'competetion' => $competetion,
                'agegroups' => $agegroups,
               ]);
    }

    public function ViewParticipantsInAgeGroup($competetion,$group)
    {
        $competetion = Competetion::findOrFail($competetion);
        $group = AgeGroup::findOrFail($group);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $paginate = 5;
        $participants = CompetetionHelper::ParticipantsInAgeGroup($competetion->id,$group->id);
        $age_groups = AgeGroupHelper::All();
        $queries = [];
        if (request('search')) {
            $participants = $participants->where('name','LIKE','%'.request('search').'%')
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
            $participants = $participants->where('age_group_id',$age_group->id);
            $queries['age_group'] = request('age_group');
        }
        //Student are Active Or Blocked
        if (request('status')) {
            //dd(request('status'));
            if (request('status')=="ActiveStudents") {
                $participants = new User;
                $queries['status'] = request('status');
            }
            if (request('status')=="BlockedStudents") {
                $participants = User::onlyTrashed();
                $queries['status'] = request('status');
            }
        }

        $participants = $participants->paginate($paginate)->appends($queries);
        return view('Admin.Dashboard.Competetions.View.AgeGroups.Participants.index')
               ->with([
                'competetion' => $competetion,
                'participants' => $participants,
                'group' => $group,
               ]);
    }

    public function RatedArticles($competetion)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);

        $articles = CompetetionHelper::TotalRatedArticles($competetion->id);
        $paginate = 5;
        $columns = ['status','visibility'];
        $queries = [];
        if (request('search')) {
            $articles = $articles->where('title','LIKE','%'.request('search').'%')
            ->orWhere('content','LIKE','%'.request('search').'%');
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
        if ($articles) {
            $articles = $articles->paginate($paginate)->appends($queries);
        }else{
          $articles = false;  
        }
        return view('Admin.Dashboard.Competetions.View.RatedArticles.index')
               ->with([
                'competetion' => $competetion,
                'articles' => $articles,
               ]);
    }

    public function SubmittedArticles($competetion)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $articles = CompetetionHelper::TotalSubmittedArticles($competetion->id);
        $paginate = 5;
        $columns = ['status','visibility'];
        $queries = [];
        if (request('search')) {
            $articles = $articles->where('title','LIKE','%'.request('search').'%')
            ->orWhere('content','LIKE','%'.request('search').'%');
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
        if ($articles) {
            $articles = $articles->paginate($paginate)->appends($queries);
        }else{
          $articles = false;  
        }

        return view('Admin.Dashboard.Competetions.View.SubmittedArticles.index')
               ->with([
                'competetion' => $competetion,
                'articles' => $articles,
               ]);
    }

    public function ViewedArticles($competetion)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $articles = CompetetionHelper::TotalReadArticles($competetion->id);
        $paginate = 5;
        $columns = ['status','visibility'];
        $queries = [];
        if (request('search')) {
            $articles = $articles->where('title','LIKE','%'.request('search').'%')
            ->orWhere('content','LIKE','%'.request('search').'%');
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
        if ($articles) {
            $articles = $articles->paginate($paginate)->appends($queries);
        }else{
          $articles = false;  
        }
        return view('Admin.Dashboard.Competetions.View.ViewedArticles.index')
               ->with([
                'competetion' => $competetion,
                'articles' => $articles,
               ]);
    }

    public function ResumeCompetetion($competetion)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $current_date = date('Y-m-d');
        if (CompetetionHelper::CanResume($competetion->id)) {
            if (CompetetionHelper::IsPaused($competetion->id)) {
                if ($competetion->ending_date > $current_date) {
                    if ($competetion->update(['status' => 'STARTED'])) {
                        return back()->with('success','Started Successfully!');
                    }else{
                        return back()->with('error','Something Went Wrong!');
                    }
                }else{
                    return redirect()->route('EditCompetetion',$competetion->id)->with('error','Please Change the Date.The Date '.$competetion->ending_date.' is Older Than the Current Date '.$current_date);
                }
            }else{
                return back()->with('error','You can not Resume it!');
            }
        }else{
            return back()->with('error','This Competetion is already ended.You can not Resume it!');
        }
    }

    public function PauseCompetetion($competetion)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        if (CompetetionHelper::CanPause($competetion->id)) {
            if (CompetetionHelper::IsStarted($competetion->id)) {
                if ($competetion->update(['status' => 'PAUSED'])) {
                    return back()->with('success','Paused Successfully!');
                }else{
                    return back()->with('error','Something Went Wrong!');
                }
            }else{
                return back()->with('error','Start the Competetion first then you can Pause it!');
            }
        }else{
            return back()->with('error','This Competetion is already ended.You can not Pause it!');
        }
    }

    public function StartCompetetion($competetion)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $current_date = date('Y-m-d');
        if (CompetetionHelper::CanStart($competetion->id)) {  
            if ($competetion->ending_date > $current_date) {
                if ($competetion->update(['status' => 'STARTED','starting_date' => $current_date])) {
                    return back()->with('success','Started Successfully!');
                }else{
                    return back()->with('error','Something Went Wrong!');
                }
            }else{
                return redirect()->route('EditCompetetion',$competetion->id)->with('error','Please Change the Date.The Date '.$competetion->ending_date.' is Older Than the Current Date '.$current_date);
            }
        }else{
            return back()->with('error','You can not Start this Competetion!');
        }
    }

    public function EndCompetetion($competetion)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $current_date = date('Y-m-d');
        if (!(CompetetionHelper::IsInitializing($competetion->id))) {
            if (!(CompetetionHelper::IsEnded($competetion->id))) {
                if ($competetion->update(['status' => 'ENDED','ended_at' => $current_date,'result_status' => 'PENDING'])) {
                    return back()->with('success','Ended Successfully!');
                }else{
                    return back()->with('error','Something Went Wrong!');
                }
            }else{
                return back()->with('error','This Competetion is Already Ended!');
            }
        }else{
            return back()->with('error','This Competetion is not yet Started and Initializing only so you can delete it.!');
        }
    }

    public function ViewParticipantData($competetion,$participant)
    {
        $competetion = Competetion::findOrFail($competetion);
        $user = User::withTrashed()->findOrFail($participant);
        return 
        view('Admin.Dashboard.Competetions.View.ParticipantData.index')
        ->with([
            'competetion' => $competetion,
            'user' => $user,
        ]);
    }
}

<?php 
namespace App\Http\Helpers\Writer\Traits;
use Illuminate\Support\Facades\Auth;
use App\WriterViewedArticle;
use App\User;
use App\Article;
use Datetime;
use App\AgeGroup;

trait WriterRegistration
{
    /*begin::Writer Competetion Calculate Age*/
    public static function CalculateAge($from,$to)
    {
        $start = new DateTime($from);
        $end = new Datetime($to);
        return $diff = $end->diff($start);

    }/*end::Writer Competetion Calculate Age*/

    /*begin::Writer Age Group Value*/
    public static function Group($id)
    {   
    if (!is_null($agegroup = AgeGroup::find($id))) {

            return $agegroup->group_from."-".$agegroup->group_to." Years";

         }else{

            return null;
        }

    }/*end::Writer Age Group Value*/

    /*begin::Writer Competetion Calculate Age Group*/
    public static function AgeGroup($from,$to)
    {	

    $group = self::CalculateAge($from,$to);
    if (!is_null($agegroup = AgeGroup::all())) {

            foreach ($agegroup as $groups) {
                if($group->y >= $groups->group_from AND $group->y <= $groups->group_to){
                    return $groups->id;
                }
            }

         }else{

            return null;

        }

    }/*end::Writer Competetion Calculate Age Group*/


    /*begin::Writer Registration*/
    public static function Register($request)
    {
        $rules = [
            'name.required' => 'Please Enter your Name',
            'role.in' => 'Something Went Wrong',
            'parents_consent.in' => 'Parents Should be Agreed!',
            'email.required' => 'Please Enter your Email',
            'password.required' => 'Please Enter your Password',
            'password.confirmed' => 'Confirm Password does not match',
        ];

        $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'date_of_birth' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],

            'mother_name' => ['required', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],

            'parents_consent' => ['required','in:yes', 'string', 'max:255'],
            'school_name' => ['required', 'string', 'max:255'],
            'school_email' => ['required', 'string', 'max:255'],
            'school_phone' => ['required', 'string', 'max:255'],
            'school_address' => ['required', 'string', 'max:255'],

            'course' => ['required', 'string', 'max:255'],

            'favourite_educator_name' => ['required', 'string', 'max:255'],
            'favourite_educator_email' => ['required', 'string', 'max:255'],
            'favourite_educator_phone' => ['required', 'string', 'max:255'],
            'favourite_educator_address' => ['required', 'string', 'max:255'],

            'favourite_institute_name' => ['required', 'string', 'max:255'],
            'favourite_institute_email' => ['required', 'string', 'max:255'],
            'favourite_institute_phone' => ['required', 'string', 'max:255'],
            'favourite_institute_address' => ['required', 'string', 'max:255'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],$rules);


    	if (!is_null($agegroup = self::AgeGroup($request->date_of_birth,date('Y-m-d')))) {

    		$agegroup = $agegroup->id;

    	}else{
    		return back()
    		->with('error','Minimum Age Should be 8 Years');
    	}

	    $values = [

	        'name' => $request->name,
	        'email' => $request->email,
	        'age_group_id' => $agegroup,
	        'phone' => $request->phone,
	        'role' => "Writer",
	        'role_id' => 2,
	        'type' => "Writer",

	        'date_of_birth' => $request->date_of_birth,
	        
	        'address' => $request->address,

	        'mother_name' => $request->mother_name,
	        'father_name' => $request->father_name,

	        'parents_consent' => $request->parents_consent,

	        'school_name' => $request->school_name,

	        'school_email' => $request->school_email,

	        'school_phone' => $request->school_phone,

	        'school_address' => $request->school_address,

	        'course' => $request->course,

	        'favourite_educator_name' => $request->favourite_educator_name,

	        'favourite_educator_email' => $request->favourite_educator_email,

	        'favourite_educator_phone' => $request->favourite_educator_phone,

	        'favourite_educator_address' => $request->favourite_educator_address,

	        'favourite_institute_name' => $request->favourite_institute_name,

	        'favourite_institute_email' => $request->favourite_institute_email,

	        'favourite_institute_phone' => $request->favourite_institute_phone,

	        'favourite_institute_address' => $request->favourite_institute_address,

	        'password' => bcrypt($request->password),
	            
	        ];

	        if ($user = User::create($values)) {

	                return redirect()
	                ->route('login')
	                ->with('success','Thank you for Registration.You can login in here.');

	        }else{
	            return back()
	            ->with('error','Something Went Wrong With the Registration!');
	        }
  
    }/*end::Writer Registration*/

}

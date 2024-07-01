<?php
namespace App\Http\Controllers\Writer;

use App\User;
use Illuminate\Http\Request;
use App\WriterPaypalAccount;
use App\Http\Helpers\Writer\Writer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Student\Student;

class WriterAccountController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(['auth','writer']);
    }

    public function BasicInformation()
    {
        return view('Writer.Dashboard.Settings.BasicInformation.index');
    }
    public function SaveBasicInformation(Request $request)
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
        'date_of_birth' => ['required', 'date'],
        'address' => ['required', 'string'],
        'place_of_birth' => ['required', 'string'],
        'father_name' => ['nullable', 'string'],
        'mother_name' => ['nullable', 'string'],
        ],$rules);
        if (!is_null($agegroup = Student::AgeGroup($request->date_of_birth,date('Y-m-d')))){
            $agegroup;
        }else{
            return back()->with('error','Minimum Age Should be 8 Years');
        }
        $data = [
        'name' => $request->name,
        'email' => $request->email,
        'age_group_id' => $agegroup,
        'phone' => $request->phone,
        'date_of_birth' => $request->date_of_birth,
        'address' => $request->address,
        'place_of_birth' => $request->place_of_birth,
        'father_name' => $request->father_name,
        'mother_name' => $request->mother_name,
        ];
        if($user->update($data)){
            return back()->with('success','Basic Information has been Updated Successfully!');
        }else{
        return back()->with('error','Something Went Wrong! Please Try again Later.');
        }
    }

    public function ProfilePicture()
    {
        return view('Writer.Dashboard.Settings.ProfilePicture.index');
    }
    public function SaveProfilePicture(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $rules = [
            'profile_picture.mimes' => 'Image Should be JPG,JPEG Or PNG',
        ];
        $request->validate([
        'profile_picture' => ['nullable','mimes:jpg,jpeg,png'],
        ],$rules);
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
    }

    public function RemoveProfilePicture()
    {
        $user = User::findOrFail(Auth::user()->id);
        if($user->update(['user_image' => null])){
            return back()->with('success','Profile Picture has been Removed Successfully!');
        }else{
        return back()->with('error','Something Went Wrong! Please Try again Later.');
        }
    }

    public function SchoolInformation()
    {
        return view('Writer.Dashboard.Settings.SchoolInformation.index');
    }

    public function SaveSchoolInformation(Request $request)
    {
        $rules = [
            'school_email.email' => 'Please Enter a Valid Email',
            'school_phone.numeric' => 'Phone must be a Number',
        ];
        $request->validate([
        'school_name' => ['nullable', 'string'],
        'school_email' => ['nullable', 'email'],
        'school_phone' => ['nullable', 'numeric'],
        'school_address' => ['nullable', 'string'],
        'course' => ['nullable', 'string'],
        ],$rules);

        $user = User::findOrFail(Auth::user()->id);
        $data = [
        'school_name' => $request->school_name,
        'school_email' => $request->school_email,
        'school_phone' => $request->school_phone,
        'school_address' => $request->school_address,
        'course' => $request->course,
        ];
        if($user->update($data)){

            return back()->with('success','School Information has been Updated Successfully!');

        }else{

        return back()->with('error','Something Went Wrong! Please Try again Later.');

        }
    }

    public function TeacherInformation()
    {
        return view('Writer.Dashboard.Settings.TeacherInformation.index');
    }

    public function SaveTeacherInformation(Request $request)
    {
        $rules = [
            'favourite_educator_email.email' => 'Please Enter a Valid Email',
            'favourite_educator_phone.numeric' => 'Phone must be a Number',
        ];
        $request->validate([
        'favourite_educator_name' => ['nullable', 'string'],
        'favourite_educator_email' => ['nullable', 'email'],
        'favourite_educator_phone' => ['nullable', 'numeric'],
        'favourite_educator_address' => ['nullable', 'string'],
        ],$rules);

        $user = User::findOrFail(Auth::user()->id);
        $data = [

        'favourite_educator_name' => $request->favourite_educator_name,
        'favourite_educator_email' => $request->favourite_educator_email,
        'favourite_educator_phone' => $request->favourite_educator_phone,
        'favourite_educator_address' => $request->favourite_educator_address,

        ];

        if($user->update($data)){

            return back()->with('success','Teacher Information has been Updated Successfully!');

        }else{

        return back()->with('error','Something Went Wrong! Please Try again Later.');

        }
    }

    public function InstituteInformation()
    {
        return view('Writer.Dashboard.Settings.InstituteInformation.index');
    }

    public function SaveInstituteInformation(Request $request)
    {
        $rules = [
            'favourite_institute_email.email' => 'Please Enter a Valid Email',
            'favourite_institute_phone.numeric' => 'Phone must be a Number',
        ];
        $request->validate([
        'favourite_institute_name' => ['nullable', 'string'],
        'favourite_institute_email' => ['nullable', 'email'],
        'favourite_institute_phone' => ['nullable', 'numeric'],
        'favourite_institute_address' => ['nullable', 'string'],
        ],$rules);

        $user = User::findOrFail(Auth::user()->id);
        $data = [

        'favourite_institute_name' => $request->favourite_institute_name,
        'favourite_institute_email' => $request->favourite_institute_email,
        'favourite_institute_phone' => $request->favourite_institute_phone,
        'favourite_institute_address' => $request->favourite_institute_address,

        ];

        if($user->update($data)){

            return back()->with('success','Institute Information has been Updated Successfully!');

        }else{

        return back()->with('error','Something Went Wrong! Please Try again Later.');

        }
    }


    public function Security()
    {
        return view('Writer.Dashboard.Settings.Security.index');
    }

    public function SavePassword(Request $request)
    {
        $rules = [
            'password.min' => 'Password Should be Minimum 8 Characters Long.',
            'password.confirmed' => 'Confirm Password Did not Match.',
        ];

        $request->validate([
        'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ],$rules);

        if (!is_null($request->password)) {
            $user = User::findOrFail(Auth::user()->id);
            if($user->update(['password' => bcrypt($request->password)])){
                return back()->with('success','Password has been Changed Successfully!');
            }else{
            return back()->with('error','Something Went Wrong! Please Try again Later.');
            }
        }else{
            return back()->with('success','You Did Not Enter Any Password');
        }
    }

    public function PaypalAccounts()
    {
        $accounts = Writer::PaypalAccounts(Auth::user()->id);
        return view('Writer.Dashboard.PaypalAccounts.index',compact('accounts'));
    }

    public function AddPaypalAccount(Request $request)
    {
        $rules = [
            'account_name.required' => 'Enter Name from Account',
            'account_email.required' => 'Enter PaypalAccount ID',
            'account_email.unique' => 'The Account '.$request->account_email.' is Already in use',
        ];
        $request->validate([
            'account_name' => 'required|string',
            'account_email' => 'required|string|unique:student_paypal_accounts,email',
        ],$rules);
        $data = [
            'user_id' => Auth::user()->id,
            'account_name' => $request->account_name,
            'email' => $request->account_email,
        ];

        if (WriterPaypalAccount::create($data)) {
            return back()->with('success','Added Successfully!');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function UpdatePaypalAccount(Request $request,$id)
    {
        $Account = WriterPaypalAccount::findOrFail($id);

        $rules = [
            'account_name.required' => 'Enter Name from Account',
            'account_email.required' => 'Enter PaypalAccount ID',
            'account_email.unique' => 'The Account '.$request->account_email.' is Already in use',
        ];
        $request->validate([
            'account_name' => 'required|string',
            'account_email' => 'required|string|unique:student_paypal_accounts,email,'.$Account->id,
        ],$rules);

        if ($Account->user_id == Auth::user()->id) {
            $data = [
                'account_name' => $request->account_name,
                'email' => $request->account_email,
            ];
            if ($Account->update($data)) {
                return back()->with('success','Updated Successfully!');
            }else{
                return back()->with('error','Something Went Wrong!');
            }
        }else{
           return back()->with('error','Something Went Wrong!'); 
        }
    }

    public function DeletePaypalAccount($id)
    {
        if (Writer::DeletePaypalAccount(Auth::user()->id,$id)) {
            return back()->with('success','Deleted Successfully!');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

}

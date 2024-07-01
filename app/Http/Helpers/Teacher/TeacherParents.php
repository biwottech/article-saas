<?php 
namespace App\Http\Helpers\Teacher;
use Illuminate\Support\Facades\Auth;
use App\User;

trait TeacherParents

{

    public static function Register($request)
    {

        $rules = [
            'name.required' => 'Please Enter your Name',
            'email.required' => 'Please Enter your Email',
            'password.required' => 'Please Enter your Password',
            'password.confirmed' => 'Confirm Password does not match',
        ];

    $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'school_name' => ['required', 'string', 'max:255'],
            'school_address' => ['required', 'string', 'max:255'],
            'course' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],$rules);

    $values = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'role' => "Teacher",
        'role_id' => 3,
        'type' => "Reader",
        'address' => $request->address,
        'school_name' => $request->school_name,
        'school_address' => $request->school_address,
        'course' => $request->course,
        'password' => bcrypt($request->password),
        ];

        if ($user = User::create($values)) {
            return redirect()
                ->route('login')
                ->with('success','Thank you for Registration.You can login in here.');
            }else{

                return back()->with('error','Something Went Wrong!');
            }
        }

}

?>

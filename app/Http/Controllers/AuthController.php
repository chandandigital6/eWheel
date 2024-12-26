<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;


class AuthController extends Controller
{

    public function index(){

        if(!Auth::check()){
            return view('auth.login');
        }else{
            return redirect()->route('auth.dashboard');
        }


    }
    public function registration(){
        return view('auth.registration');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255', // Adjust the max length as needed
            'email' => 'email',
            'number' => 'integer',
            'password' => 'required'
        ]);

        // Hash the password before storing it
        $request->merge(['password' => bcrypt($request->input('password'))]);

        $user = User::create($request->all());

        if ($user) {
            return redirect()->route('login-form')->with('success','successfully registered ');
        } else {
            echo "error";
        }
    }

    public function login(Request $request){
//        dd($request);
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password],true)){
            return redirect()->route('auth.dashboard');
//            echo  "logind ";
        }
        else{
            return redirect()->back()->with('error','email or password does not match');
        }
    }


    public function dashboard(){
        return view('auth.dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login-form');
    }



    // forgot password

    public function forget(){
        return view('auth.forget');
    }



    public function showChangePasswordForm() {
        return view('auth.change-password');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password does not match.');
        }

        $user->password = bcrypt($request->new_password);
        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success', 'Password and name successfully updated.');
    }


    public function forget_pass(Request $request){
//        try {
//         $user = User::where('email',$request->email)->get();
//         if(count($user) >0){
//         $token =Str::random(40);
//         $domain = URL::to('/');
//         $url =$domain.'/reset-password?token='.$token;
//             $data = [
//                 'url' => $url,
//                 'email' => $request->email,
//                 'title' => 'Password reset',
//                 'body' => 'Please click on the below link to reset your password.'
//             ];
//         Mail::to('for',['data'=>$data],function ($massage) use ($data){
//             $massage->to($data['email'])->subject($data['title']);
//         });
//
//         }else{
//             return back()->with('error',"email is not exists");
//         }
//
//        }catch (\Exception $e){
//            return back()->with('error',$e->getMessage());
//        }

        try {
            // Find the user by email
            $user = User::where('email', $request->email)->get();

            // If user exists
            if($user){
                // Generate a random token
                $token = Str::random(40);

                // Construct the password reset URL
                $url = URL::to('/reset-password?token='.$token);

                // Data to be sent in the email
                $data = [
                    'url' => $url,
                    'email' => $request->email,
                    'title' => 'Password reset',
                    'body' => 'Please click on the below link to reset your password.'
                ];

                // Send password reset email
                Mail::to($data['email'])->send(new ResetPasswordMail($data));
                $dateTime = Carbon::now()->format('Y-m-d H:i:s');

                // Update or create password reset record
                PasswordReset::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'token' => $token,
                        'created_at' => $dateTime
                    ]
                );
                return back()->with('success', 'Password reset link has been sent to your email.');
            } else {
                return back()->with('error', 'Email does not exist.');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function reset_password(Request $request){
        $resetData = PasswordReset::where('token', $request->token)->first();
//       dd($resetData);
        if ($resetData) {
            // Find the user by email
            $user = User::where('email', $resetData->email)->first();
//            dd($user);
            // Pass the user's email to the reset_passwordView
            return view('auth.reset_passwordView', ['email' => $user->email]);
        } else {
            return 'Invalid token.';
        }
    }
//    public function reset_password(Request $request){
//        // Check if token is set
//        if (!isset($request->token)) {
//            echo "Page expired";
//            return;
//        }
//
//        // Find the password reset data
//        $resetData = PasswordReset::find($request->token);
//
//        // If password reset data is found
//        if ($resetData) {
//            // Find the user by email
//            $user = User::where('email', $resetData->email)->first();
//
//            // If user is found, pass user data to reset_passwordView
//            if ($user) {
//                return view('auth.reset_passwordView', compact('user'));
//            } else {
//                echo "User not found";
//            }
//        } else {
//            echo "Invalid token";
//        }
//    }

    public function store_password(Request $request){
        $request->validate([
            'password' => 'required|confirmed|string|min:6',
        ]);

        // Make sure $request->id is present and valid
        $user = User::find($request->email);
        dd($user);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        PasswordReset::where('email', $user->email)->delete();

        return redirect()->route('login-form')->with('success', 'Your password is successfully reset');
    }




//    public function reset_password(Request $request) {
//        if (!isset($request->token)) {
//            echo "page expired";
//            return;
//        }
//
//        $resetData = PasswordReset::where('token', $request->token)->first();
//
//        if ($resetData) {
//            // Manually convert created_at to a Carbon instance
//            $createdAt = new Carbon($resetData->created_at);
//
//            // Check if the token has expired
//            if ($createdAt->addMinutes(60)->isPast()) { // assuming a 60-minute expiration
//                echo "Token has expired";
//                return;
//            }
//
//            $user = User::firstWhere('email', $resetData->email);
//
//            if ($user) {
//                return view('auth.recoverPassword', compact('user'));
//            } else {
//                echo "User not found";
//            }
//        } else {
//            echo "Invalid token";
//        }
//    }




//    public function store_password(Request $request){
//        $request->validate([
//            'password' => 'required|confirmed|string|min:6',
//        ]);
//
//        // Make sure $request->id is present and valid
//        $user = User::find($request->id);
//
//        if (!$user) {
//            return redirect()->back()->with('error', 'User not found');
//        }
//
//        $user->password = Hash::make($request->password);
//        $user->save();
//
//        PasswordReset::where('email', $user->email)->delete();
//
//        return redirect()->route('login-form')->with('success', 'Your password is successfully reset');
//    }





}

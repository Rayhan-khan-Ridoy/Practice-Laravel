<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('loginForm');
    }
    public function loginVerify(Request $request){
        
        // $user=new User();
        $myUser= User::where('email',$request->email)->first();
        // dd($myUser);
        //  dd($myUser);
        if ($request->email == $myUser->email && Hash::check($request->password, $myUser->password)) {
            session()->flush();
            session(['authUser'=>'User is verified']);
            session(['userName'=>$myUser->name]);
            // session()->put('mango',"mango is sweet");
           return view('userDashboard');
        }else{
            return redirect()->back();
        }
        
    }
}

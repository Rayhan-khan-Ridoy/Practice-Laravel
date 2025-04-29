<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegisterForm(){
        return view('register');
    }

    public function showUserList(){
        $users= User::get();
        // dd($users);
        return view('userlist',['users'=>$users]);
    }
    public function submitRegisterForm(Request $request){
        //  dd($request);
        //    $request->validate([
        //         'name'=>'required|string|max:20',
        //         'email'=>'required|email|unique:users,email',
        //         'password'=>'required|min:6',
        //         'password_confirmation'=>'required|same:password',

        //     ],[
        //         'name.required' => 'Please enter your name.',
        //         'email.required' => 'Email is mandatory.',
        //         'email.email' => 'Enter a valid email address.',
        //         'email.unique' => 'This email is already taken.',
        //         'password.required' => 'Password cannot be empty.',
        //         'password.min' => 'Password must be at least 6 characters.',
        //         'password_confirmation.same' => 'Passwords do not match.',
        //     ]);

        $validOrNot= Validator::make($request->all(),[
                    'name'=>'required|string|max:20',
                    'email'=>'required|email|unique:users,email',
                    'password'=>'required|min:6',
                    'password_confirmation'=>'required|same:password',
                
        ],
        [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Email is mandatory.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'Password cannot be empty.',
            'password.min' => 'Password must be at least 6 characters.',
            'password_confirmation.same' => 'Passwords do not match.',
        ]);
       
        if($validOrNot->fails()){
            // dd($validOrNot->errors()->all());
            return redirect()->back()->withErrors($validOrNot)->withInput();
         };
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return "Registration is done!";
    }

    public function showEditForm($id){
        // dd($id);
        $user=User::findOrFail($id);
        return view('editForm')->with('foundUser',$user);
    }

    public function updateEditForm(Request $request){
        $user= User::findOrFail($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        session()->flash('success','User updated successfully!');
        return view('success');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/showUserList')->with('success', 'User deleted successfully!');
    }
}

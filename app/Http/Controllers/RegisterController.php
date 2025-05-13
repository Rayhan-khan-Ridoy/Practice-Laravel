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
        // dd($request->all());
        $request->validate([
            'name' => 'required| min:3 | max:20| string',
            'email' => 'required| email|unique:users,email',
            'password' => 'required| min:6',
            'password_confirmation' => 'required| same:password'
        ], [
            'name.required' => 'Please fill in your name.',
            'name.min' => 'Name must be at least 3 characters.',
            'name.max' => 'Name cannot be more than 20 characters.',
            'email.unique' => 'This email has been used.',
            'password.min' => 'Password must be at least 6 characters',
            'password_cofirmation.same' => 'Password does not match.'
        ]);

        // $incoming_fields = Validator::make($request->all(), [
        //     'name' => 'required| min:3 | max:20| string',
        //     'email' => 'required| email|unique:users,email',
        //     'password' => 'required| min:6',
        //     'password_confirmation' => 'required| same:password'
        // ], [
        //     'name.required' => 'Please fill in your name.',
        //     'name.min' => 'Name must be at least 3 characters.',
        //     'name.max' => 'Name cannot be more than 20 characters.',
        //     'email.unique' => 'This email has been used.',
        //     'password.min' => 'Password must be at least 6 characters',
        //     'password_cofirmation.same' => 'Password does not match.'
        // ]);

        // if($incoming_fields->fails()){
        //     return redirect()->back()->withErrors($incoming_fields)->withInput();
        // }

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

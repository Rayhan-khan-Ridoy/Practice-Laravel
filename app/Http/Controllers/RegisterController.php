<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

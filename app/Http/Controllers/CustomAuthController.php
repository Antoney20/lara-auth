<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CustomAuthController extends Controller
{
    //
    public function login(){
        return view("auth.login");

    }
    public function register (){
        return view("auth.Register");
    }
    public function registerUser (Request $request){
      $request -> validate([
        'name'=> 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:3'
      ]);
      $user = new User();
      $user -> name = $request -> name;
      $user -> password = Hash::make($request -> password);
      $user -> email = $request -> email;
      $res = $user -> save();

      if($res){
           return back() -> with('success', 'Successfully saved user');
      }
      else{
        return back() -> with('fail', 'Failed to save user');
      }
    }
    public function loginUser(Request $request){
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
          ]);
          $user = User::where('email' ,'=', $request-> email)-> first();

          if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password is incorrect!');
            }
        
       }
       else{
        return back() -> with('fail', 'This email is not registered');
       }
    }
    public function dashboard(){
  return view('dashboard');
    }
}
?>
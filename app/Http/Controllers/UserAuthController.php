<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function login(){
        return view('login');
    }
    
    public function loginSubmit(Request $request){
        //print_r($_POST);
        //die();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:50',
            'password' => 'required|min:8',
        ]);
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $check = Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password]);
        if($check){
            //echo "if "; die();
            return redirect()->route('home');
        }else {
            //echo "else "; die();
            return redirect()->back()
                ->with('error', 'Email and Password not matched!')
                ->withInput($request->only('email'));
        }
        //return view('login');
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    
    public function loginSubmit(Request $request){
        
        //Route::get('/page/about-us',function(){})->name('about')
        //{{ route('about') }} on html anchor href
        
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'email' => 'required|max:50',
            'password' => 'required|max:50'
        ]);
        
        //$validator->fails()
        if($validator->passes()){
            if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }else {
                return redirect()->back()
                ->with('error', 'Email and Password not matched!')  //Session::has('error')Session::get('error')
                //session('error') -- isse dono ho jata he laravel 10 me | error? and print
                //session('success') -- isse dono ho jata he laravel 10 me | success? and print
                //session('status') -- isse dono ho jata he laravel 10 me | status? and print
                //->with('success', 'Email and Password not matched!')  //Session::has('success')Session::get('success')
                ->withInput($request->only('email'));
            }
        }else {
            return redirect()->back()
            ->withErrors($validator);
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }






}
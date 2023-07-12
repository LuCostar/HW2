<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\Account;

class LoginController extends BaseController
{

    public function login_form(){
        if(Session::get('user_id')){
            return redirect ('home');
        }
        $error = Session::get('error');
        Session::forget('error');
        return view('login')->with('error', $error);
    }

    public function do_login(){
        if(Session::get('user_id')){
            return redirect('home');
        }
        if(strlen(request('username')) == 0 || strlen(request('password')) == 0){
            Session::put('error', 'empty_fields');
            return redirect('login')->withInput();
        }
        $user = Account::where('username', request('username'))->first();
        if (!$user){
            Session::put('error', 'wrong_user');
            return redirect('login')->withInput();
        }
        if($user && !password_verify(request('password'), $user->PASSWORD)){
            Session::put('error', 'wrong_password');
            return redirect('login')->withInput();
        }

        Session::put('user_id', $user->ID);
        return redirect('home');
    }

    public function register_form() {
        
        $error = Session::get('error');
        Session::forget('error');
        return view("register")->with('error', $error);
    }

    public function do_register() {
        
        if(strlen(request('username')) == 0 || strlen(request('password')) == 0 || strlen(request('email')) == 0 || strlen(request('name')) == 0 || strlen(request('surname')) == 0){
            Session::put('error', 'empty_fields');
            return redirect('register')->withInput();
        }
        else if(request('password') != request('confirm_password')){
            Session::put('error', 'bad_password');
            return redirect('register')->withInput();
        }
        else if(Account::where('USERNAME', request('username'))->first()){
            Session::put('error', 'existing_user');
            return redirect('register')->withInput();
        }
        else if (Account::where('EMAIL', request('email'))->first()){
            Session::put('error', 'existing_email');
            return redirect('register')->withInput();
        }
        
        $user = new Account;
        $user->NAME = request('name');
        $user->SURNAME = request('surname');
        $user->USERNAME = request('username');
        $user->EMAIL = request('email');
        $user->PASSWORD = password_hash(request('password'), PASSWORD_BCRYPT);
        $user->timestamps = false;
        $user->save();
        //login 
        Session::put('user_id', $user->ID);
        //redirect
        return redirect('home');
    }

    public function logout(){
        
        Session::flush();
        return redirect('login');
    }
}

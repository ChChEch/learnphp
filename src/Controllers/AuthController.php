<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function registerForm(){
        view('register');
    }
    public function loginForm(){
        view('login');
    }
    public function register(){
        if($_POST['password'] === $_POST['confirm_password']) {
            $user = new User();
            $user->fname = $_POST['fname'];
            $user->lname = $_POST['lname'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->save();
        }

    }
    public function login(){
        $user = User::where('email', $_POST['email']);
        if($user && $user->password == $_POST['password']){
           $_SESSION['user_id'] = $user->id;
        }
    }

}
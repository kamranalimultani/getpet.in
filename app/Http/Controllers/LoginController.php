<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function AdminloginForm()
    {
        if((session()->has('admin')))
        {
            return redirect('admin/dashboard');
        }
        return view("Admin.LOGIN.LoginForm2");
    }

    public function AdminloginValidation(Request $req)
    {
        $req->validate([
            'vUsername'=>'required',   
            'vPassword'=>'required'
            ]);
        $user= User::where('email', '=' ,$req->vUsername)
                        ->first();
        if($user) 
        {     
          if(Hash::check( $req->vPassword,$user->password)) 
            {
              session()->put('user', $user);
              return redirect('/admin/dashboard');
            }
            else
            {
                session(['msg-success' => 'Wrong Credentials']);
            }
        }
        
        return redirect('/admin');

     
    
    }
    public function adminDashboard()
    {
        return view('Admin.Dashboard.Dashboard');
    }
    public function logout()
    {
        if(session()->has('admin'))
        {
            session()->remove('admin');
        }
        
        return redirect('admin');
       
    }
}

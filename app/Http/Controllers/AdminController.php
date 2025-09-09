<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController
{
    public function index(){
        if(Auth::id()){
            $role = Auth::user()->role;
            if($role == 'admin'){
                return redirect()->route('homeAdmin')->with('success', 'Welcome to the Admin Dashboard!');

            } else if($role == 'etudiant'){ 
                return view('admin.finance-dashboard');

            } elseif($role == 'professeur') {
                return view('admin.user-dashboard');

            } else if($role == 'parent') {
                return view('admin.parent-dashboard');

            }else {
                return redirect()->back()->with('error', 'Invalid user role.');
            }
                
            } else{
                return redirect()->route('login')->with('error', 'Please login to access the dashboard.');
            }
        
    }
}

<?php
namespace Laraspace\Http\Controllers;

class DashboardController extends Controller
{
    public function index() 
    {
        if(\Auth::user()->role=="admin"){
            return redirect()->route('admin/users');
        }
        elseif(\Auth::user()->role=="moderator"){
            return redirect()->route('admin/users');
        }
        elseif(\Auth::user()->role=="user"){
            return redirect("user/profile");
        }
    }

    public function basic() 
    {
         return view('admin.dashboard.basic');
    }

    public function ecommerce() 
    {
        return view('admin.dashboard.ecommerce');
    }

    public function finance() 
    {
        return view('admin.dashboard.finance');
    }
}

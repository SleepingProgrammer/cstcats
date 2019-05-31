<?php
namespace Laraspace\Http\Controllers;

class FrontendController extends Controller
{
    public function home()
    {
        if(\Auth::user()->role=="admin"){
            return redirect()->route('admin/users');
        }
        elseif(\Auth::user()->role=="user"){
            if(\Auth::user()->approved==1){
                return redirect("user/profile");
            }
            else{
                return redirect("user/account_settings");
            }
        }
        elseif(\Auth::guest()){
            return redirect("/login");
        }
    }
}

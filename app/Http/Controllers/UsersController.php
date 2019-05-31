<?php
namespace Laraspace\Http\Controllers;

use Laraspace\User;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Laraspace\Alumni;

class UsersController extends Controller
{
    public function index()
    {
        $moderators = User::where('role', 'moderator')->get();
        $users = User::where('role', 'user')->where('approved',1)->get();
        $applicants = User::where('role', 'user')->where('approved',0)->get();

        return view('admin.users.index', array('users'=> $users,'moderators'=> $moderators,'applicants'=> $applicants));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show')->with('user', $user);
    }

    public function showData($id)
    {
        $user = User::findOrFail($id);
        return Response::json($user);
    }

    public function store(Request $request)
    {   
        //check if passwords match
        if($request->password!=$request->password_confirmation){
            $errorText = "Passwords Do Not Match";
            switch($request->registeredFrom){
                case "Registration Form":
                    flash()->error($errorText);
                    return redirect()->back()->withInput($request->all());
                break;
                case "Admin Form":
                    $errorData = array("error" => $errorText);
                    return Response::json($errorData);
                break;
                default:
                    flash()->error($errorText);
                    return redirect()->back()->withInput($request->all());
                break;
            }
        }

        //check if password is blank
        if($request->password==""||$request->password_confirmation==""){
            $errorText = "Password is blank!";
            switch($request->registeredFrom){
                case "Registration Form":
                    flash()->error($errorText);
                    return redirect()->back()->withInput($request->all());
                break;
                case "Admin Form":
                    $errorData = array("error" => $errorText);
                    return Response::json($errorData);
                break;
                default:
                    flash()->error($errorText);
                    return redirect()->back()->withInput($request->all());
                break;
            }
        }
        
        //check if password is above 3 characters
        if(strlen($request->password)<=3){
            $errorText = "Password is too short! Please make it longer than 3 characters.";
            switch($request->registeredFrom){
                case "Registration Form":
                    flash()->error($errorText);
                    return redirect()->back()->withInput($request->all());
                break;
                case "Admin Form":
                    $errorData = array("error" => $errorText);
                    return Response::json($errorData);
                break;
                default:
                    flash()->error($errorText);
                    return redirect()->back()->withInput($request->all());
                break;
            }
        }
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if(isset($request->role)){
            $user->role = $request->role;
        }
        switch($request->registeredFrom){
            case "Registration Form":
                $user->role = "user";
            break;
            case "Admin Form":
                $user->role = "moderator";
            break;
            default:
                $user->role = $user->role;
            break;
        }
        $user->can_post = $request->can_post;
        $user->can_comment = $request->can_comment;
        $user->approved = $request->approved;

        $user->save();

        $alumni = new Alumni;
        $alumni->user_id = $user->id;
        $alumni->save();
        
        switch($request->registeredFrom){
            case "Registration Form":
                flash()->success('Registration Successful');
                return redirect("login");
            break;
            case "Admin Form":
                return Response::json($user);
            break;
            default: 
                flash()->success('Registration Successful');
                return redirect("login");
            break;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->name = $request->name;
        if(isset($request->password)){

        }
        $user->password = bcrypt($request->password);
        $user->can_post = $request->can_post;
        $user->can_comment = $request->can_comment;
        $user->approved = $request->approved;
        $user->save(); 
        return Response::json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function approveApplicant($id)
    {
        $user = User::find($id);
        $user->approved = 1;
        $user->save(); 
        return Response::json($user);
    }



    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        flash()->success('User Deleted');

        return redirect()->back();
    }
    
}

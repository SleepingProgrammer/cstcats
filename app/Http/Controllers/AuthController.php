<?php
namespace Laraspace\Http\Controllers;

use Auth;
use Laraspace\Http\Requests;
use Laraspace\User;
use Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.sessions.login');
    }

    public function postLogin(Requests\LoginRequest $request)
    {
        if (User::login($request)) {
            flash()->success('Welcome to CSTC ATS.');
            if (Auth::user()->isAdmin()) {
                return redirect()->to('/admin/users');
            }
            elseif (Auth::user()->isModerator()) {
                return redirect()->to('/moderator/users');
            }
            elseif (Auth::user()->isUser()) {
                return redirect()->to('/user/profile');
            } else {
                return redirect()->to('/');
            }
        }
        flash()->error('Invalid Login Credentials');
        
        return redirect()->back();
    }

    public function logOut()
    {
        Auth::logout();

        return redirect()->to('/login');
    }

    public function register()
    {
        return view('admin.sessions.register');
    }

    /**
     * Redirect the user to the authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $provider_user = Socialite::driver($provider)->user();
        $user = $this->findUserByProviderOrCreate($provider, $provider_user);
        auth()->login($user);
        flash()->success('Welcome to Laraspace.');

        if(Auth::user()->role=="admin"){
            return redirect()->route('admin/users');
        }
        elseif(Auth::user()->role=="user"){
            return redirect("user/profile");
        }
    }

    private function findUserByProviderOrCreate($provider, $provider_user)
    {
        $user = User::where($provider . '_id', $provider_user->token)
            ->orWhere('email', $provider_user->email)
            ->first();
        if (!$user) {
            $user = User::create([
                'name' => $provider_user->name,
                'email' => $provider_user->email,
                $provider . '_id' => $provider_user->token
            ]);
        } else {
            // Update the token on each login request
            $user[$provider . '_id'] = $provider_user->token;
            $user->save();
        }

        return $user;
    }
}

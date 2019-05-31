<?php
namespace Laraspace;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Alumni;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'can_post', 'can_comment', 'approved', 'facebook_id', 'google_id', 'github_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function canPost()
    {
        return ($this->can_post == true);
    }
    public function canComment()
    {
        return ($this->can_comment == true);
    }
    public function approved()
    {
        return ($this->approved == true);
    }

    public function isAdmin()
    {
        return ($this->role == 'admin');
    }

    public function isModerator()
    {
        return ($this->role == 'moderator');
    }

    public function isUser()
    {
        return ($this->role == 'user');
    }

    public static function login($request)
    {
        $remember = $request->remember;
        $email = $request->email;
        $password = $request->password;
        return (\Auth::attempt(['email' => $email, 'password' => $password], $remember));
    }

    public function alumni(){
        return $this->hasOne('Laraspace\Alumni');
    }
}

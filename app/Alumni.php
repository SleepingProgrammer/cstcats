<?php

namespace Laraspace;

use Illuminate\Database\Eloquent\Model;
use Laraspace\User;

class Alumni extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'gender','profile_picture', 'current_employment_status', 'landline', 'phone', 'address','birthday', 'proof_link'
    ];

    /**
     * Get the user that owns this information.
     */
    public function user()
    {
        return $this->belongsTo('Laraspace\User');
    }

    /**
     * Get the user that owns this information.
     */
    public function messages()
    {
        $messages = $this->hasMany('Laraspace\Message');

        return $this->belongsTo('Laraspace\Message');
    }

}

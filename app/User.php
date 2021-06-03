<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin','fb_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addNew($input)
    {

        $check = User::where('fb_id',$input['facebook_id'])->first();
        if(is_null($check)){

            User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make('123456789'),
                'fb_id'=> $input['facebook_id']
            ]);


        }

        return $check;
    }
}

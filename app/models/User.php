<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model
	 * consider adding roles so a user can be created to be an admin :const ROLE_ADMIN = 1; const ROLE_USER = 2;
	 * @var string
	 */
	protected $table = 'users';

	public static $user_rules = [
    	'first'=>'required',
    	'last'=>'required',
    	'username'=>'reqired|max:15',
    	'password'=>'required|min:6'
    ];
    public static $user_update_rules = [
    	'first'=>'required',
    	'last'=>'required',
    	'password'=>'required|min:6'
    ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}

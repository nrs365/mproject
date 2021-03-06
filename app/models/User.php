<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Validation\Validator;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model
	 * consider adding roles so a user can be created to be an admin :const ROLE_ADMIN = 1; const ROLE_USER = 2;
	 * @var string
	 */
	// protected $fillable = array('name', 'email', 'password');
	protected $table = 'users';

	public static $user_rules = [
    	'first'    => 'required',
        'last'     => 'required',
        'username' => 'required|max:25',
        'password' => 'required|min:6',
        'email'    => 'required|email'
    ];
    public static $user_update_rules = [
    	'first'    => 'required',
        'last'     => 'required',
        'password' => 'required|min:6',
        'email'    => 'required|email'
    ];

       public function getRememberTokenName()
    {
     return null; // not supported
    }
     
    /**
    * Overrides the method to ignore the remember token.
    */
    public function setAttribute($key, $value)
    {
     $isRememberTokenAttribute = $key == $this->getRememberTokenName();
     if (!$isRememberTokenAttribute)
     {
      parent::setAttribute($key, $value);
     }
    }

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}

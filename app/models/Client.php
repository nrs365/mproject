<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	// protected $fillable = [];

	protected $table = 'clients';
    public static $rules = [
        'company_name'=>'required'
    ];
    public static $client_update_rules = [
        'company_name'=>'required'
    ];
}
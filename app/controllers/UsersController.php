<?php

class UsersController extends \BaseController {

	public function __construct()
	{
    	// call base controller constructor
    	parent::__construct();
    	
    	// check if the user is authenticated unless home page or registration(create)
    	$this->beforeFilter('auth', array('except' => array('show', 'index')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		// $user = Auth::user();

		// //prepare data for passing to user dashboard view
		// $data = [
		// 	'user' => $user,
		// 	'first' => $first,
		// 	'last' => $last,
		// 	'password' => $password
		// ];

		// return View::make('users.edit')->with($data);
	
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//

		$user = Auth::User();
		//create error messages
		$messageValue = 'Your information has been updated.';
		$eMessageValue = 'There is an error updating your information.';

		$validator = Validator::make(Input::all(), User::$user_update_rules);
		if ($validator->fails()) {
		//redirect with errors
			Session::flash('errorMessage', $eMessageValue);
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$user->first = Input::get('first');
			$user->last = Input::get('last');
			$user->password = Input::get('password');
			$user->save();
		}	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

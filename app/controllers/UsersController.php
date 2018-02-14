<?php

class UsersController extends BaseController {

	public function __construct()
	{
    	parent::__construct();
    	
    	// check if the user is authenticated unless home page or registration(create)
    	$this->beforeFilter('auth', array('except' => array('create', 'index')));
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
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate the input
        
        $rules = array(
        'first'    => 'required',
        'last'     => 'required',
        'username' => 'required|max:25',
        'password' => 'required|min:6',
        'email'    => 'required|email'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('users/create')->withErrors($validator)->withInput(Input::except('password'));
        } else {
            // add the new user
            $user = new User;
            $user->first     = Input::get('first');
            $user->last      = Input::get('last');
            $user->$username = Input::get('username');
            $user->password  = Hash::make(Input::get('password'));
            $user->save();

            // redirect
            Session::flash('message', 'Thank you for registering.');
            return Redirect::to('users');
        }
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
		$data = [
			'first' => $first,
			'last' => $last,
			'username' => $username,
		];
		return View::make('users.show')->with($data);
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
		$user = Auth::User();
		//create error messages
		$messageValue = 'Your information has been updated.';
		$eMessageValue = 'There is an error updating your information.';

		$validator = Validator::make(Input::all(), User::$user_update_rules);
		if ($validator->fails()) {
		//redirect with errors
			Session::flash('errorMessage', $eMessageValue);
			// return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$user->first     = Input::get('first');
			$user->last      = Input::get('last');
			$user->password  = Hash::make(Input::get('password'));
			$user->save();
		}
		Session::flash('successMessage', $messageValue);
		return Redirect::action('UsersController@show', $user->first);
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

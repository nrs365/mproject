@extends('layouts.master')


@section('content')

<div class="container">

		{{ Form::open(array('action' => array('HomeController@doRegistration'), 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form')) }}
		  
		  <div class="form-group">
		  	{{ Form::label('first', 'First Name', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-7">
		    	{{ Form::text('first', Input::old('first'), array('class' => 'form-control', 'placeholder' => 'First Name')) }}
		    </div>
		  </div>

		  <div class="form-group">
		  	{{ Form::label('last', 'Last Name', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-7">
		    	{{ Form::text('last', Input::old('last'), array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
			</div>
		  </div>

		  <div class="form-group">
		  	{{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-7">
		    	{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'username')) }}
		    </div>
		  </div>
		  <div class="form-group">
		  	{{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-7">
		    	{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) }}
		    </div>
		  </div>
		  <div class="form-group">
		  	{{ Form::label('password', 'Password', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-7">
		    	{{ Form::text('password', Input::old('username'),array('class' => 'form-control', 'placeholder' => 'password')) }}
		    </div>
		  </div>

		  {{ Form::Submit('Register', array('class' => 'btn btn-theme col-md-offset-2'))}}
		  {{ Form::close() }}

	</div>

	

</div>			


@stop
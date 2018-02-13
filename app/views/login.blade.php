@extends('layouts.master')

@section('content')
{{ Form::open(array('action'=>'HomeController@doLogin', 'class'=>'form-signin', 'method'=>'POST')) }}
<span class="glyphicon glypicon-lock"></span> <h2>Please sign in</h2><br>
{{ Form::label('email') }}<br>
{{ Form::text('email') }}<br>
{{ Form::label('Password') }}<br>
{{ Form::password('password') }}<br>

{{ Form::checkbox('remember', 'remember', false, ['id' => 'remember']) }}
{{ Form::label('remember', ' Remember my login') }}<br>
{{ Form::submit('Log in!', ['class' => 'btn btn-primary btn block']) }}<br>
{{ Form::close() }}
@stop
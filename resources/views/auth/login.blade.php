@extends('layouts.layout')

@section('page_title')
	Log In
	
@stop

@section('content')
	
    {!! Form::open(['rout' => 'auth\login', 'method' => 'post', 'class' => 'form-horizontal']) !!}
        <!-- Email Form Input -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            {!! Form::label('email', 'Email:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
              {!! Form::text('email', Input::get('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
            </div>
        </div>

        <!-- Password Form Input -->
        <div class="form-group">
            {!! Form::label('password', 'Password:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
              {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
            </div>
        </div>

        <!-- Sign In Button -->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('Sign In', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

    {!! Form::close() !!}
@stop
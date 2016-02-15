@extends('layouts.layout')

@section('page_title')
	Edit Post details
@stop

@section('content')
	<div class="row">
	    <div class="col-md-12">
	    	@include('posts.forms.form')
	    </div>
	</div>
@stop
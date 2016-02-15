@extends('layouts.layout')

@section('page_title')
	Post Create
@stop

@section('content')
	<div class="row">
	    <div class="col-md-12">
		 	@include('posts.forms.form')
		</div>
	</div>
@stop
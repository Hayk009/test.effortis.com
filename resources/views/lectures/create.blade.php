@extends('layouts.layout')

@section('page_title')
	Create Lecture
@stop

@section('content')
	<div class="row">
	    <div class="col-md-12">
		 	@include('lectures.forms.form')
		</div>
	</div>
@stop
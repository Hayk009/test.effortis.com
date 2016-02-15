@extends('layouts.layout')

@section('page_title')
	Edit Lecture details
@stop

@section('content')
	<div class="row">
	    <div class="col-md-12">
	    	@include('lectures.forms.form')
	    </div>
	</div>
@stop
@extends('layouts.layout')

@section('page_title')
	Posts 
	@if(Auth::check())
		<a class="btn btn-info pull-right btn-sm" href="posts/create">Add Post</a>
	@endif
@stop

@section('content')
	<div class="row">

	    @if ($posts->isEmpty())
	    	@include('layouts.alerts.noResult')
	    @else	
	    	@include('posts.parts.list')
	    @endif
		
	</div>
@stop
@extends('layouts.layout')

@section('page_title')
	Lectures
	@if(Auth::check())
		<a class="btn btn-info pull-right btn-sm" href="lectures/create">Add Lecture</a>
	@endif
@stop

@section('content')
		
	    @if ($lectures->isEmpty())
	    	@include('layouts.alerts.noResult')
	    @else
	    <table class="table table-hover table-bordered table-striped table-condensed">
 		  <thead>
 		    <tr class="info">
 		      <th>Title</th>
 		      <th>Description</th>
 		      <th>Open</th>
 		      <th>Download</th>
 		      @if(Auth::check())
 		      	<th>Action</th>
 		      @endif
 		    </tr>
 		  </thead>
 		  <tbody>
 		    
	    	@include('lectures.parts.list')
 		    
 		  </tbody>
 		</table>	
	    @endif
@stop
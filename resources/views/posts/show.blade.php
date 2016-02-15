@extends('layouts.layout')

@section('page_title')
	Posts 
	
@stop


@section('content')
	<div class="row">
		<div class="col-md-12">
			<div>
				<h2><b>{{ $post->title }}</b></h2>
			</div>
			<div>
				<img src="/postImages/{{ $post->image }}" class="img-responsive">
			</div>
			<div>
				<p>{{ $post->description }}</p>
			</div>
			<div>
				<p class="pull-right">Created : {{ $post->created_at }}</p>
			</div>
			<a href="/posts" class="btn btn-primary">Back</a>
		</div>

	</div>
@stop
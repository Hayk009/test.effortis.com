
<!-- <div class="lectures-item">
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12">
				<a href="posts/{{ $post->id }}" style="text-decoration:none;">
					<h2><b>{{ $post->title }}</b></h2>
				</a>
				
			</div>
			<div class="col-md-5">
				<img src="postImages/{{ $post->image }}" class="img-responsive">
			</div>
			<div class="col-md-7">
				<p>{{ substr($post->description, 0, 100 )}}...</p>
				<p class="pull-right" >Created :<b> {{ $post->created_at }}</b></p>
			</div>
			@if(Auth::check())

    			{!! Form::open( [ 'url' => URL::to('/posts',[$post->id]) , 'method' => 'DELETE', 'style' => 'float:left' ]) !!}
					{!! Form::submit('Delete' , [ 'class' => 'btn btn-xs btn-danger s']) !!}
				{!! Form::close() !!}

				@if($post->active)
					<a href="posts/active/{!! $post->id !!}/0" class="btn btn-xs btn-success " >
						Open
					</a>
				@else
					<a href="posts/active/{!! $post->id !!}/1" class="btn btn-xs btn-warning " >
						Close
					</a>
				@endif
				<a href="posts/{!! $post->id !!}/edit" class="btn btn-xs btn-info " >
					Edit
				</a>
			@endif
		</div>
	</div>
</div> -->

<div class=" col-md-3">
    <div class="thumbnail">
      <img src="postImages/{{ $post->image }}" alt="242x200">
      <div class="caption" style="overflow: hidden">
        <h3><a href="posts/{{ $post->id }}">{{ $post->title }}</a></h3>
        <p>{{ substr( $post->description , 0 , 90 )}}...</p>
        <p class="" >Created :<b > {{ $post->created_at }}</b></p>
        <p>
        	@if(Auth::check())

				<p>
	    			{!! Form::open( [ 'url' => URL::to('/posts',[$post->id]) , 'method' => 'DELETE', 'style' => 'float:right' ]) !!}
						{!! Form::submit('Delete' , [ 'class' => 'btn btn-xs btn-danger s']) !!}
					{!! Form::close() !!}
					
				</p>

				@if($post->active)
					<a href="posts/active/{!! $post->id !!}/0" class="btn btn-xs btn-success pull-right" style="margin-right:10px">
						Open
					</a>
				@else
					<a href="posts/active/{!! $post->id !!}/1" class="btn btn-xs btn-warning pull-right" style="margin-right:10px">
						Close
					</a>
				@endif
				<a href="posts/{!! $post->id !!}/edit" class="btn btn-xs btn-info pull-right" style="margin-right:10px">
					Edit
				</a>
			@endif
        </p>
      </div>
    </div>
  </div>
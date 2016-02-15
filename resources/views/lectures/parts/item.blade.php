
<tr class="something">
  <td class="col-md-3">{!! $lecture->title !!}</td>
  <td class="col-md-5">{!! $lecture->description !!}</td>
  <td class="col-md-1" style="text-align:center"><a href="lectures/{!! $lecture->id !!}" class="btn btn-info btn-xs ">Open</a></td>
  <td class="col-md-1" style="text-align:center"><a href="lectures/download/{!! $lecture->id!!}" class="btn btn-success btn-xs ">Download</a></td>
  @if(Auth::check())
    <td class="col-md-2" >
   		{!! Form::open( [ 'url' => URL::to('/lectures',[$lecture->id]) , 'method' => 'DELETE', 'style' => 'float:right' ]) !!}
			{!! Form::submit('Delete' , [ 'class' => 'btn btn-xs btn-danger s']) !!}
		{!! Form::close() !!}
		@if($lecture->active)
			<a href="lectures/active/{!! $lecture->id !!}/0" class="btn btn-xs btn-success pull-right" style="margin-right:10px">
				Open
			</a>
		@else
			<a href="lectures/active/{!! $lecture->id !!}/1" class="btn btn-xs btn-warning pull-right" style="margin-right:10px">
				Close
			</a>
		@endif
		<a href="lectures/{!! $lecture->id !!}/edit" class="btn btn-xs btn-info pull-right" style="margin-right:10px">
			Edit
		</a>
	</td>
   @endif
</tr>
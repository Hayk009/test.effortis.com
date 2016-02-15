@if(isset($post)) 
    {!! Form::model( $post , [ 'url' => URL::to('/posts',[$post->id]) , 'class' => 'form-horizontal', 'method' => 'PUT' ]) !!}
@else
    {!! Form::open( [ 'url' => URL::to('/posts') , 'class' => 'form-horizontal', 'method' => 'POST','files' => true ]) !!}
@endif
        
        <div class="form-group col-md-8">
            {!! Form::label('title', 'Title:', array('class' => 'control-labelrequired-icon') ) !!}
            {!! Form::text( 'title' , null, [ 'class' => 'form-control' , 'id' => 'name' ]) !!}
        </div>
        <div class="form-group col-md-8">
            {!! Form::label('description', 'Description:', array('class' => 'control-label required-icon') ) !!}
            {!! Form::textarea( 'description' , null, [ 'class' => 'form-control' , 'id' => 'name' ]) !!}
        </div>
        <div class="form-group col-md-8">
             
            @if(isset($post))
                <img src="/postImages/{!! $post->image !!}" class="img-responsive">
                
            @else
                {!! Form::label('file', 'Image:', array('class' => 'control-label required-icon') ) !!}
                {!! Form::file( 'image' , null, [ 'class' => 'form-control' ,]) !!}
            @endif
        </div>
        <div class="form-group col-md-8">
            <a  href="/posts" class="btn btn-default">Cancel</a>
            @if(isset($post))
              {!! Form::submit( 'Save changes' , [ 'class' => 'btn btn-success' ]) !!}
            @else
                {!! Form::submit( 'Save' , [ 'class' => 'btn btn-success' ]) !!}
            @endif
        </div>
    {!! Form::close() !!}
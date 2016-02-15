@if(isset($lecture)) 
    {!! Form::model( $lecture , [ 'url' => URL::to('/lectures',[$lecture->id]) , 'class' => 'form-horizontal', 'method' => 'PUT' ]) !!}
@else
    {!! Form::open( [ 'url' => URL::to('/lectures') , 'class' => 'form-horizontal', 'method' => 'lecture','files' => true ]) !!}
@endif
        
        <div class="form-group col-md-8">
            {!! Form::label('title', 'Title:', array('class' => 'control-labelrequired-icon') ) !!}
            {!! Form::text( 'title' , null, [ 'class' => 'form-control' , 'id' => 'name' ]) !!}
        </div>
        <div class="form-group col-md-8">
            {!! Form::label('description', 'Description:', array('class' => 'control-label required-icon') ) !!}
            {!! Form::textarea( 'description' , null, [ 'class' => 'form-control' , 'id' => 'name' ]) !!}
        </div>
            @if(empty($lecture))
                <div class="form-group col-md-8">
                     
                    {!! Form::label('file', 'Lecture File:', array('class' => 'control-label required-icon') ) !!}
                    {!! Form::file( 'file' , null, [ 'class' => 'form-control' ,]) !!}
                </div>
            @endif
        <div class="form-group col-md-8">
            <a  href="/lectures" class="btn btn-default">Cancel</a>
            @if(isset($lecture))
              {!! Form::submit( 'Save changes' , [ 'class' => 'btn btn-success' ]) !!}
            @else
                {!! Form::submit( 'Save' , [ 'class' => 'btn btn-success' ]) !!}
            @endif
        </div>
    {!! Form::close() !!}
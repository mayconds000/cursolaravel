@extends('layout.app')


@section('content')

  <h1> Edit post </h1>
   {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]]) !!}
    <div class="form-group">
      {!! Form::label('title', 'Title') !!}
      {!! Form::text('title', null, ['class'=>'form-control']) !!}
    
    </div>
    <div class="form-group">
      {!! Form::submit('Edit the Post', ['class'=>'btn btn-primary']) !!}
    </div>
  
  {!! Form::close() !!}

   {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}
    <div class="form-group">
      {!! Form::submit('Delete Post', ['class'=>'btn btn-dangger']) !!}
    </div>
  
  {!! Form::close() !!}



  @endsection


@yield('footer')
@extends('layout.app')


@section('content')
  {{-- <form action="/posts" method="post"> --}}

  {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store']) !!}
    <div class="form-group">
      {!! Form::label('title', 'Title') !!}
      {!! Form::text('title', null, ['class'=>'form-control']) !!}
    
    </div>

    <div class="form-group">
      {!! Form::label('content', 'Content') !!}
      {!! Form::text('content', null, ['class'=>'form-control']) !!}
    
    </div>

    <div class="form-group">
      {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>
  
  {!! Form::close() !!}

  @endsection


@yield('footer')
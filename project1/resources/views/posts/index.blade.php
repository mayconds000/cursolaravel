@extends('layout.app')


@section('content')
  <ul>
    @foreach($posts as $post)

    <li class="image-container">
      <img src="{{$post->path}}" alt="" height="100">
    </li>

      <li><a href="{{route('posts.show', $post->id)}}">{{ $post->title }}</a></li>

    @endforeach
  </ul>

@endsection

@yield('footer')
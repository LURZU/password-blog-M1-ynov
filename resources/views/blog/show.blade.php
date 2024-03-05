
@extends('base')


@section('title', $post->name)

@section('content')

<a href="{{ route('blog.index') }}" class="flex items-center font-medium text-gray-700 hover:text-gray-900">
    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    Voir tout les articles
  </a>
  
    <h1 class="text-3xl text-center font-bold mb-4">{{ $post->name }}</h1>

    <div class="prose mx-60 lg:prose-xl mt-10 mb-8">
      {!! $post->content !!}
    </div>
  

@endsection


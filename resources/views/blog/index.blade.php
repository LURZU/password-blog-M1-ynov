
@extends('base')


@section('title', 'Mon blog')

@section('content')



    <div class="container mx-auto my-12">
        @auth
        <div class="">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Gérer les posts</button>
        </div>
        @endauth

        <div class="flex flex-wrap -mx-4">
        @foreach ($posts as $post)

                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        <a href="{{route('blog.show', ['slug'=> $post->slug, 'post' => $post->id])}}">
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                            @if($post->image)
                            <img src="{{$post->imageUrl()}}" alt="Image de l'article" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-4">
                                <div class="flex center">
                                    <p class="mr-4 justify-center text-center">
                                        @if($post->category)
                                        Categorie : {{$post->category?->name}}
                                        @endif
                                    </p>

                                </div>
                                <h2 class="text-xl font-bold mb-2 text-center"><a href="#" class="hover:text-blue-500">{{ $post->name }}</a></h2>
                            </div>
                        </div>
                    </a>
                    </div>
        @endforeach

        </div>
    <div>
        {{$posts->links()}}



@endsection


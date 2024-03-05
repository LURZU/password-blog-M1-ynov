<div class="max-w-md mx-auto">
    <form action="" method="post" class="bg-white p-6 rounded-lg shadow-lg" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">
                Titre
            </label>
            <input class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:shadow-outline" type="text" name="name" placeholder="Titre" value="{{old('name', $post->name)}}">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="image">
                Image
            </label>
            <input class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:shadow-outline" type="file" name="image" placeholder="Titre" >
            @error('image')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="slug">
                Slug
            </label>
            <input class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:shadow-outline" type="text" name="slug" placeholder="Ex: mon-voyage-en-tuni" value="{{old('slug', $post->slug)}}">
            @error('slug')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="content">
                Contenu
            </label>
            <textarea class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:shadow-outline" name="content" placeholder="Contenu de démonstration" >{{old('content', $post->content)}}</textarea>
            @error('content')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="category">
                Catégorie
            </label>
            <select class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:shadow-outline"  id="category" name="category_id" placeholder="Ex: mon-voyage-en-tuni">
                <option value="">Choisir une catégorie</option>
                @foreach($categories as $category)
                    <option @selected(old('category_id', $post->category_id) == $category->id) value="{{$category->id}}"  >{{$category->name}}</option>
                @endforeach
            </select>
                @error('category_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            @php
                $tagsId = $post->tags->pluck('id');   
            @endphp
            <label class="block text-gray-700 font-bold mb-2" for="tag">
                Tag
            </label>
            <select class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:shadow-outline"  id="tag" name="tags[]" placeholder="Ex: mon-voyage-en-tuni" multiple>
                @foreach($tags as $tag)
                    <option @selected($tagsId->contains($tag->id)) value="{{$tag->id}}"  >{{$tag->name}}</option>
                @endforeach
            </select>
                @error('tags')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="text-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                @if($post->id)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>
</div>
@extends('dashboard.index')

@section('title', 'Blog gestion')
@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold text-gray-800">Articles du Blog</h1>
            <a href="{{ route('blog.create') }}" class="btn bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Créer un nouvel article</a>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full table-auto">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contenu</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $post->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ Str::limit($post->content, 50) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}" class="text-blue-600 hover:text-blue-900">Voir</a>
                            <a href="{{ route('blog.edit', $post->id) }}" class="text-indigo-600 hover:text-indigo-900 ml-4">Modifier</a>
                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
@endsection

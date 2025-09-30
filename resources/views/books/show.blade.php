<x-app-layout>

<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-semibold mb-2">{{ $book->title }}</h1>
    <p class="text-gray-600 mb-1">Autor: {{ $book->author?->name }}</p>
    <p class="text-gray-600 mb-4">Publicado: {{ \Illuminate\Support\Carbon::parse($book->publication_year)->format('Y-m-d') }}</p>
    <div class="prose max-w-none">
        {!! nl2br(e($book->synopsis)) !!}
    </div>

    <div class="mt-6 flex gap-2">
        <a href="{{ route('books.edit',$book) }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Editar</a>
        <a href="{{ route('books.index') }}" class="px-4 py-2 rounded border">Volver</a>
    </div>
</div>
</x-app-layout>

<x-app-layout>

<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-semibold mb-2">{{ $author->name }}</h1>
    <p class="text-gray-600 mb-2">{{ $author->email }}</p>
    <p class="text-gray-600 mb-4">Nacimiento: {{ $author->birth_date->format('Y-m-d') }}</p>
    <div class="prose max-w-none">
        {!! nl2br(e($author->biography)) !!}
    </div>

    <div class="mt-6 flex gap-2">
        <a href="{{ route('authors.edit',$author) }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Editar</a>
        <a href="{{ route('authors.index') }}" class="px-4 py-2 rounded border">Volver</a>
    </div>
</div>
</x-app-layout>

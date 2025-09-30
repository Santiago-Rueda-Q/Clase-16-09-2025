<x-app-layout>

<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Nuevo libro</h1>

    <form action="{{ route('books.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        <div>
            <x-input-label for="title" value="Título" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title') }}" required />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="author_id" value="Autor" />
            <select id="author_id" name="author_id" class="mt-1 block w-full rounded border-gray-300" required>
                <option value="">Seleccione…</option>
                @foreach($authors as $a)
                    <option value="{{ $a->id }}" @selected(old('author_id')==$a->id)>{{ $a->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="publication_year" value="Fecha de publicación" />
            <x-text-input id="publication_year" name="publication_year" type="date" class="mt-1 block w-full" value="{{ old('publication_year') }}" required />
            <x-input-error :messages="$errors->get('publication_year')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="synopsis" value="Sinopsis" />
            <textarea id="synopsis" name="synopsis" class="mt-1 block w-full rounded border-gray-300">{{ old('synopsis') }}</textarea>
            <x-input-error :messages="$errors->get('synopsis')" class="mt-2" />
        </div>

        <div class="flex gap-2">
            <x-primary-button>Guardar</x-primary-button>
            <a href="{{ route('books.index') }}" class="px-4 py-2 rounded border">Cancelar</a>
        </div>
    </form>
</div>
</x-app-layout>

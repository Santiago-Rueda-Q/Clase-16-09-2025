<x-app-layout>

<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Editar libro</h1>

    <form action="{{ route('books.update',$book) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf @method('PUT')

        <div>
            <x-input-label for="title" value="Título" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title',$book->title) }}" required />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="author_id" value="Autor" />
            <select id="author_id" name="author_id" class="mt-1 block w-full rounded border-gray-300" required>
                @foreach($authors as $a)
                    <option value="{{ $a->id }}" @selected(old('author_id',$book->author_id)==$a->id)>{{ $a->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="publication_year" value="Fecha de publicación" />
            <x-text-input id="publication_year" name="publication_year" type="date" class="mt-1 block w-full" value="{{ old('publication_year', \Illuminate\Support\Carbon::parse($book->publication_year)->format('Y-m-d')) }}" required />
            <x-input-error :messages="$errors->get('publication_year')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="synopsis" value="Sinopsis" />
            <textarea id="synopsis" name="synopsis" class="mt-1 block w-full rounded border-gray-300">{{ old('synopsis',$book->synopsis) }}</textarea>
            <x-input-error :messages="$errors->get('synopsis')" class="mt-2" />
        </div>

        <div class="mt-4 sm:mt-6">
            <div class="flex items-center gap-4">
                <div>
                    <x-primary-button>Actualizar</x-primary-button>
                </div>
                <div>
                    <a href="{{ route('books.index') }}" class="px-4 py-2 rounded border">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
</div>
</x-app-layout>

<x-app-layout>

<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Editar autor</h1>

    <form action="{{ route('authors.update',$author) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf @method('PUT')
        <div>
            <x-input-label for="name" value="Nombre" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name',$author->name) }}" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email',$author->email) }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="birth_date" value="Fecha de nacimiento" />
            <x-text-input id="birth_date" name="birth_date" type="date" class="mt-1 block w-full" value="{{ old('birth_date',$author->birth_date?->format('Y-m-d')) }}" required />
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="biography" value="Biografía" />
            <textarea id="biography" name="biography" class="mt-1 block w-full rounded border-gray-300">{{ old('biography',$author->biography) }}</textarea>
            <x-input-error :messages="$errors->get('biography')" class="mt-2" />
        </div>

<div class="mt-6 sm:mt-8">
            <div class="flex items-center gap-4">
                <div>
                    <x-primary-button>Actualizar</x-primary-button>
                </div>
                <div>
                    <a href="{{ route('authors.index') }}" class="px-4 py-2 rounded border">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
</div>
</x-app-layout>

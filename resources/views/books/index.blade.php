<x-app-layout>
    <div class="w-full px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Libros</h1>
            <a href="{{ route('books.create') }}" class="px-4 py-2 bg-indigo-600 text-black rounded hover:bg-indigo-700">
                + Nuevo libro
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 rounded bg-green-50 text-green-800 px-4 py-2">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="w-full table-fixed text-sm border border-gray-300 border-collapse">
                {{-- Título 40%, Autor 25%, Publicación 20%, Acciones 15% --}}
                <colgroup>
                    <col style="width:40%">
                    <col style="width:25%">
                    <col style="width:20%">
                    <col style="width:15%">
                </colgroup>
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold border border-gray-300">Título</th>
                        <th class="px-4 py-3 text-left font-semibold border border-gray-300">Autor</th>
                        <th class="px-4 py-3 text-left font-semibold border border-gray-300">Publicación</th>
                        <th class="px-4 py-3 text-left font-semibold border border-gray-300">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $b)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border border-gray-300 truncate">{{ $b->title }}</td>
                            <td class="px-4 py-3 border border-gray-300 truncate">{{ $b->author?->name }}</td>
                            <td class="px-4 py-3 border border-gray-300">
                                {{ \Illuminate\Support\Carbon::parse($b->publication_year)->format('Y-m-d') }}
                            </td>
                            <td class="px-4 py-3 border border-gray-300">
                                <div class="flex flex-wrap items-center gap-2">
                                    <a href="{{ route('books.show',$b) }}"
                                       class="inline-flex items-center px-3 py-1.5 rounded-md border text-xs font-medium text-sky-700 border-sky-200 hover:bg-sky-50">
                                        Ver
                                    </a>
                                    <a href="{{ route('books.edit',$b) }}"
                                       class="inline-flex items-center px-3 py-1.5 rounded-md border text-xs font-medium text-indigo-700 border-indigo-200 hover:bg-indigo-50">
                                        Editar
                                    </a>
                                    <form action="{{ route('books.destroy',$b) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar libro?');" class="inline">
                                        @csrf @method('DELETE')
                                        <button
                                            class="inline-flex items-center px-3 py-1.5 rounded-md border text-xs font-medium text-red-700 border-red-200 hover:bg-red-50">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-6 border border-gray-300 text-center" colspan="4">Sin registros.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>
</x-app-layout>

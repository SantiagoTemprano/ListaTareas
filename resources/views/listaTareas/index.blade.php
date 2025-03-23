<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lista de Tareas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-link-button href="{{ route('listaTareas.create') }}">
                Nueva lista de tareas
            </x-link-button>
            @forelse ($listaTareas as $listaTarea)
            <div class="bg-white p-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl text-white"> 
                    <a href="{{ route('listaTareas.show', $listaTarea) }}" class="hover:underline"> {{ $listaTarea->nombre }} </a>
                </h2>
                <span class="block mt-4 text-sm">{{ $listaTarea->updated_at->diffForHumans() }}</span>
            </div>
            @empty
            <p class="mt-2 text-gray-500">No tienes listas de tareas.</p>
            @endforelse
            {{ $listaTareas->links() }}
        </div>
    </div>
</x-app-layout>

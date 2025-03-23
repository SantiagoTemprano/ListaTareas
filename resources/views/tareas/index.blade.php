<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tareas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-link-button href="{{ route('tareas.create') }}">
                Nueva Tarea
            </x-link-button>
            @forelse ($tareas as $tarea)
            <div class="bg-white p-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl text-white"> 
                    <a href="{{ route('tareas.show', $tarea) }}" class="hover:underline"> {{ $tarea->titulo }} </a>
                </h2>
                <p class="mt-2 text-gray-500">  {{ Str::limit($tarea->texto, 300, '...') }} </p>
                <span class="block mt-4 text-sm">{{ $tarea->updated_at->diffForHumans() }}</span>
            </div>
            @empty
            <p class="mt-2 text-gray-500">No tienes tareas.</p>
            @endforelse
            {{ $tareas->links() }}
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Listas de Tareas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <x-alert-success>{{ session('success')  }} </x-alert-success>
            <x-alert-error>{{ session('error') }} </x-alert-error>

            <div class="flex gap-6">
                <p class="text-white">Creada: {{ $listaTareas->created_at->diffForHumans() }}</p>
                <p class="text-white">Actualizada por última vez: {{ $listaTareas->updated_at->diffForHumans() }}</p>

                <x-link-button href="{{ route('listaTareas.edit', $listaTareas) }}" class="ml-auto">Editar Lista de tareas</x-link-button>

                <form action ="{{ route('listaTareas.destroy', $listaTareas) }}" method="post">
                    @method('delete')
                    @csrf
                    <x-primary-button class="!bg-red-500 !hover-red-600" onclick="return confirm('¿Seguro que quieres borrar?')">Borrar Lista
                    </x-primary-button>
                </form>
            </div>    

            <div class="bg-white p-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl text-white"> 
                    {{ $listaTareas->nombre }}
                </h2>
                <p class="mt-4 text-white whitespace-pre-wrap">  {{ $listaTareas->texto }} </p>
            </div>

            @forelse ($tareas as $tarea)
            <div class="bg-white p-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl text-white"> 
                    <a href="{{ route('tareas.show', $tarea) }}" class="hover:underline"> {{ $tarea->titulo }} </a>
                </h2>
                <p class="mt-2 text-gray-500">  {{ Str::limit($tarea->texto, 300, '...') }} </p>
                <span class="block mt-4 text-sm">{{ $tarea->updated_at->diffForHumans() }}</span>
            </div>
            @empty
            <p class="mt-2 text-gray-500">La lista no tiene tareas.</p>
            @endforelse
            {{ $tareas->links() }}
        </div>
    </div>
</x-app-layout>

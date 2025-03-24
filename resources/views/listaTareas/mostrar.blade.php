<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Listas de Tareas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex gap-6">
                <p class="text-white">Creada: {{ $listaTareas->created_at->diffForHumans() }}</p>
                <p class="text-white">Actualizada por última vez: {{ $listaTareas->updated_at->diffForHumans() }}</p>

                <x-link-button href="{{ route('listaTareas.edit', $listaTareas) }}" class="ml-auto">Editar Lista de tareas</x-link-button>
            </div>    

            <div class="bg-white p-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl text-white"> 
                    {{ $listaTareas->nombre }}
                </h2>
                <p class="mt-4 text-white whitespace-pre-wrap">  {{ $listaTareas->texto }} </p>
            </div>

        </div>
    </div>
</x-app-layout>

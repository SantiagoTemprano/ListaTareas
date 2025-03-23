<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tareas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

           <x-alert-success>{{ session('success') }} </x-alert-success>
            
            <span class="text-white px-2 py-1 border border-gray-400 bg-gray-800 rounded"> {{ $tarea->lista_tareas->nombre}} </span>

            <div class="flex gap-6">
                <p class="text-white">Creada: {{ $tarea->created_at->diffForHumans() }}</p>
                <p class="text-white">Actualizada por última vez: {{ $tarea->updated_at->diffForHumans() }}</p>

                <x-link-button href="{{ route('tareas.edit',$tarea) }}" class="ml-auto">Editar Tarea</x-link-button>

                <form action ="{{ route('tareas.destroy', $tarea) }}" method="post">
                    @method('delete')
                    @csrf
                    <x-primary-button class="!bg-red-500 !hover-red-600" onclick="return confirm('¿Seguro que quieres borrar?')">Borrar Tarea
                    </x-primary-button>
                </form>
            </div>    

            <div class="bg-white p-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl text-white"> 
                    {{ $tarea->titulo }}
                </h2>
                <p class="mt-4 text-white whitespace-pre-wrap">  {{ $tarea->texto }} </p>
            </div>

        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar tarea
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl">
                <form action="{{ route('tareas.update',$tarea) }}" method="post">
                    @method('put')
                    @csrf
                    <x-text-input name="titulo" class="w-full" placeholder="Titulo de la tarea" value="{{ @old('titulo',$tarea->titulo) }}"></x-text-input>
                    @error('titulo')
                        <div class="text-sm mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                    <x-text-area name="texto" placeholder="Descripción" class="w-full mt-6" rows="8" value="{{ @old('texto',$tarea->texto) }}"> </x-text-area>
                    @error('texto')
                        <div class="text-sm mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                    <select name="lista_tareas_id" class="w-full mt-6 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="">-- Selecciona una lista --</option>
                        @foreach ($listaTareas as $listaTarea)
                            <option value="{{ $listaTarea->id }}" @if ($tarea->lista_tareas_id == $listaTarea->id ) selected  @endif>{{ $listaTarea->nombre }}</option>
                        @endforeach
                    </select>
                    <x-primary-button class="mt-6">Guardar</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

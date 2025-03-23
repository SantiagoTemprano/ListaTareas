<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lista de Tareas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl">
                <form action="{{ route('listaTareas.store') }}" method="post">
                    @csrf
                    <x-text-input name="nombre" class="w-full" placeholder="Nombre de la lista de tareas" value="{{ @old('nombre') }}"></x-text-input>
                    @error('nombre')
                        <div class="text-sm mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                    <x-primary-button class="mt-6">Guardar</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

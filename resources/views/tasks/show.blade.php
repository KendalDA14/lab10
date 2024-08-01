<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Tarea #: {{ $task->id }}</h1>
        <hr class="my-4">
        <h2 class="text-xl font-semibold mb-4">Tarea: {{ $task->name }}</h2>
        <hr class="my-4">
        <h2 class="text-xl font-semibold mb-4">Descripción: {{ $task->description }}</h2>
        <hr class="my-4">
        <h2 class="text-xl font-semibold mb-4">Prioridad: {{ $task->priority->name }}</h2>
        <hr class="my-4">
        <h2 class="text-xl font-semibold mb-4">Usuario: {{ $task->user->name }}</h2>
        <hr class="my-4">
        <div class="mb-4">
            <h2 class="text-xl font-semibold mb-2">Etiquetas:</h2>
            <ul class="bg-white rounded-lg border border-gray-200 w-full text-gray-900">
                @foreach ($task->labels as $label)
                <li class="px-6 py-2 border-b border-gray-200 w-full">{{ $label->name }}</li>
                @endforeach
            </ul>
        </div>
        @can('autorized', $task)
        <div class="mt-6 flex space-x-4">
            <button onclick="window.location.href='/tasks/{{ $task->id }}/edit'" class="btn btn-success">
                Editar
            </button>
            <form action="/tasks/{{ $task->id }}/delete" method="POST" class="inline">
                @csrf
                @method('delete')
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Eliminar</button>
                </div>
            </form>
        </div>
        @endcan
    </div>
</x-app-layout>
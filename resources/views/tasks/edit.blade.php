<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Editar la tarea: {{ $task->name }}</h1>
        <hr class="mb-6">
        <form action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="block mb-2 font-semibold">Nombre</label>
                <input type="text" name="name" id="name" value="{{ $task->name }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 font-semibold">Descripción</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $task->description }}</textarea>
            </div>
            <div class="mb-6">
                <label for="priority" class="block mb-2 font-semibold">Prioridad</label>
                <select name="priority" id="priority" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="labels" class="block mb-2 font-semibold">Etiquetas</label>
                <select name="labels[]" id="labelsEdit" multiple class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($labels as $label)
                    <option value="{{ $label->id }}" @foreach ($task->labels as $labelEdit)
                        @if ($label->id == $labelEdit->id) selected @endif @endforeach>
                        {{ $label->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
        </form>
    </div>
</x-app-layout>
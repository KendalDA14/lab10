<x-app-layout>
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-6">Crear Tarea</h1>
        <hr class="mb-6">
        <form action="/tasks" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 font-semibold">Nombre</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 font-semibold">Descripción</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
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
                <select name="labels[]" id="labels" multiple class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($labels as $label)
                    <option value="{{ $label->id }}">{{ $label->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Crear Tarea</button>
            </div>
        </form>
    </div>

</x-app-layout>
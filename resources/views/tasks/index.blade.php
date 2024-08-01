@vite('resources/css/app.css')
<x-app-layout>
    <div class="w-full px-4 py-8">
        <main>
            <h2 class="bg-white text-3xl font-bold text-center mb-8">Mis tareas</h2>
            <div class="flex justify-between items-center mb-6">
            </div>
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Nombre</th>
                            <th class="py-3 px-6 text-left">Descripción</th>
                            <th class="py-3 px-6 text-left">Prioridad</th>
                            <th class="py-3 px-6 text-left">Usuario</th>
                            <th class="py-3 px-6 text-left">Etiquetas</th>
                            <th class="py-3 px-6 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($tasks as $task)
                        @can('autorized', $task)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 {{ $task->completed ? 'bg-green-100' : '' }}">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $task->id }}</td>
                            <td class="py-3 px-6 text-left">
                                <a href="/tasks/{{ $task->id }}" class="text-blue-600 hover:text-blue-800">{{ $task->name }}</a>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="truncate w-64">{{ $task->description }}</div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span class="@if ($task->priority->id == 1) text-red-500 @elseif ($task->priority->id == 2) text-yellow-500 @else text-green-500 @endif">
                                    {{ $task->priority->name }}
                                </span>
                            </td>
                            <td class="py-3 px-6 text-left">{{ $task->user->name }}</td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($task->labels as $label)
                                    <span class="bg-blue-200 text-blue-700 py-1 px-2 rounded-full text-xs">{{ $label->name }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                @if ($task->completed)
                                <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">Completada</span>
                                @else
                                <form action="/tasks/{{ $task->id }}/complete" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">Completar</button>
                                    </div>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endcan
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</x-app-layout>
@vite('resources/css/app.css')
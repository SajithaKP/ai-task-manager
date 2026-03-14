{{-- <x-app-layout>

    <div class="p-6 max-w-7xl mx-auto">

        <h1 class="text-2xl font-bold mb-6">Task Management</h1>

        @if (auth()->user()->role === 'admin')
            <a href="{{ route('tasks.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow">
                Create Task
            </a>
        @endif


        <div class="bg-white shadow rounded-lg mt-6 overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-4">Title</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Assigned</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($tasks as $task)
                        <tr class="border-t">

                            <td class="p-4 font-medium">
                                {{ $task->title }}
                            </td>

                            <td>
                                <span
                                    class="px-2 py-1 rounded text-xs
@if ($task->priority == 'high') bg-red-100 text-red-600
@elseif($task->priority == 'medium') bg-yellow-100 text-yellow-600
@else bg-green-100 text-green-600 @endif">
                                    {{ $task->priority }}
                                </span>
                            </td>

                            <td>

                                @if (auth()->user()->role === 'user')
                                    <form method="POST" action="{{ route('tasks.status', $task->id) }}">
                                        @csrf
                                        @method('PATCH')

                                        <select name="status" class="border rounded p-1 text-sm"
                                            onchange="this.form.submit()">

                                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending
                                            </option>
                                            <option value="in_progress"
                                                {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>
                                                Completed</option>

                                        </select>

                                    </form>
                                @else
                                    <span class="text-gray-700">
                                        {{ $task->status }}
                                    </span>
                                @endif

                            </td>

                            <td>{{ $task->user->name }}</td>

                            <td class="space-x-2">

                                <a href="{{ route('tasks.show', $task->id) }}" class="text-indigo-600 hover:underline">
                                    View
                                </a>

                                @if (auth()->user()->role === 'admin' && $task->status !== 'completed')
                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                        class="text-blue-600 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button class="text-red-600 hover:underline"
                                            onclick="return confirm('Delete this task?')">
                                            Delete
                                        </button>

                                    </form>
                                @endif

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout> --}}
<x-app-layout>

<div class="p-6 max-w-7xl mx-auto">

<h1 class="text-2xl font-bold mb-6">Task Management</h1>

@if(auth()->user()->role === 'admin')
<a href="{{ route('tasks.create') }}"
class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow">
Create Task
</a>
@endif


<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mt-6">

@foreach ($tasks as $task)

<div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition">

    <!-- Status -->
    <div class="flex justify-between items-center mb-3">
        <span class="text-xs font-semibold
        @if($task->status=='in_progress') text-blue-600
        @elseif($task->status=='completed') text-green-600
        @else text-gray-500
        @endif">
        {{ ucfirst(str_replace('_',' ',$task->status)) }}
        </span>

        <span class="text-gray-400">•••</span>
    </div>


    <!-- Title -->
    <h2 class="font-semibold text-lg text-gray-800 mb-2">
        {{ $task->title }}
    </h2>


    <!-- Description -->
    <p class="text-sm text-gray-500 mb-4">
        {{ Str::limit($task->description,80) }}
    </p>


    <!-- Priority -->
    <div class="mb-3">

        <span class="text-xs px-2 py-1 rounded
        @if($task->priority=='high') bg-red-100 text-red-600
        @elseif($task->priority=='medium') bg-yellow-100 text-yellow-600
        @else bg-green-100 text-green-600
        @endif">

        {{ ucfirst($task->priority) }}

        </span>

    </div>


    <!-- Info -->
    <div class="text-xs text-gray-500 mb-4">

        Assigned: {{ $task->user->name }} <br>

        @if($task->due_date)
        Due: {{ $task->due_date }}
        @endif

    </div>


    <!-- Actions -->
    <div class="flex justify-between items-center">

        <a href="{{ route('tasks.show',$task->id) }}"
        class="text-indigo-600 text-sm font-medium">
        View
        </a>


        @if(auth()->user()->role === 'admin' && $task->status !== 'completed')

        <div class="space-x-3">

            <a href="{{ route('tasks.edit',$task->id) }}"
            class="text-blue-600 text-sm">
            Edit
            </a>

            <form action="{{ route('tasks.destroy',$task->id) }}"
            method="POST"
            class="inline">

                @csrf
                @method('DELETE')

                <button class="text-red-600 text-sm"
                onclick="return confirm('Delete task?')">
                Delete
                </button>

            </form>

        </div>

        @endif

    </div>

</div>

@endforeach

</div>

</div>

</x-app-layout>
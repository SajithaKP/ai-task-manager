<x-app-layout>

    <div class="p-6">

        <h1 class="text-xl font-bold mb-4">Create Task</h1>

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <input type="text" name="title" placeholder="Title" class="border p-2 w-full mb-3">

            <textarea name="description" class="border p-2 w-full mb-3"></textarea>

            <select name="priority" class="border p-2 w-full mb-3">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>

            <select name="status" class="border p-2 w-full mb-3">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>

            <input type="date" name="due_date" class="border p-2 w-full mb-3">

            <select name="assigned_to" class="border p-2 w-full mb-3">
    <option value="">Select User</option>

    @foreach($users as $user)
        <option value="{{ $user->id }}">
            {{ $user->name }}
        </option>
    @endforeach

</select>

            <button class="bg-blue-500 text-white px-4 py-2">
                Save
            </button>

        </form>

    </div>

</x-app-layout>

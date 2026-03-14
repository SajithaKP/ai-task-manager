{{-- <x-app-layout>

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

</x-app-layout> --}}
<x-app-layout>

<div class="max-w-4xl mx-auto p-6">

    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Create New Task</h1>
        <p class="text-gray-500 text-sm">Fill the details below to assign a new task.</p>
    </div>

    <!-- Card -->
    <div class="bg-white shadow-xl rounded-xl p-8 border border-gray-100">

        <form method="POST" action="{{ route('tasks.store') }}" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Task Title
                </label>
                <input type="text" name="title"
                    placeholder="Enter task title"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Description
                </label>
                <textarea name="description"
                    rows="4"
                    placeholder="Enter task description"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"></textarea>
            </div>

            <!-- Grid Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Priority -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Priority
                    </label>
                    <select name="priority"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-500">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Status
                    </label>
                    <select name="status"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-500">
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <!-- Due Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Due Date
                    </label>
                    <input type="date" name="due_date"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Assign User -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Assign User
                    </label>
                    <select name="assigned_to"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-500">
                        <option value="">Select User</option>

                        @foreach($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-4 pt-4">

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg shadow-md transition">
                    Create Task
                </button>

                <a href="{{ route('tasks.index') }}"
                    class="text-gray-600 hover:text-gray-800 text-sm">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</x-app-layout>
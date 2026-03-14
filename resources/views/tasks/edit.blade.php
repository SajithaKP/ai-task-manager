<x-app-layout>

<div class="p-10">

    <!-- Page Header -->
    <div class="mb-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-white">Edit Task</h1>

        <a href="{{ route('tasks.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
            + New Task
        </a>
    </div>


    <!-- Background Panel -->
    <div class="bg-gradient-to-r from-slate-800 to-blue-900 p-10 rounded-2xl shadow-lg">

        <div class="bg-white rounded-xl shadow-lg p-8 max-w-3xl">

            <!-- Task Title -->
            <h2 class="text-xl font-semibold mb-6">
                Edit Task Details
            </h2>


            <form method="POST" action="{{ route('tasks.update',$task->id) }}">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-5">
                    <label class="block text-sm text-gray-600 mb-2">Task Title</label>

                    <input
                        type="text"
                        name="title"
                        value="{{ $task->title }}"
                        class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                    >
                </div>


                <!-- Description -->
                <div class="mb-5">
                    <label class="block text-sm text-gray-600 mb-2">Description</label>

                    <textarea
                        name="description"
                        rows="4"
                        class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                    >{{ $task->description }}</textarea>
                </div>


                <!-- Priority -->
                <div class="mb-5">

                    <label class="block text-sm text-gray-600 mb-2">
                        Priority
                    </label>

                    <select
                        name="priority"
                        class="w-full border rounded-lg px-4 py-2"
                    >

                        <option value="low" {{ $task->priority=='low'?'selected':'' }}>
                            Low
                        </option>

                        <option value="medium" {{ $task->priority=='medium'?'selected':'' }}>
                            Medium
                        </option>

                        <option value="high" {{ $task->priority=='high'?'selected':'' }}>
                            High
                        </option>

                    </select>

                </div>


                <!-- Status -->
                <div class="mb-5">

                    <label class="block text-sm text-gray-600 mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full border rounded-lg px-4 py-2"
                    >

                        <option value="pending" {{ $task->status=='pending'?'selected':'' }}>
                            Pending
                        </option>

                        <option value="in_progress" {{ $task->status=='in_progress'?'selected':'' }}>
                            In Progress
                        </option>

                    </select>

                </div>


                <!-- Assign User -->
                <div class="mb-6">

                    <label class="block text-sm text-gray-600 mb-2">
                        Assign To
                    </label>

                    <select
                        name="assigned_to"
                        class="w-full border rounded-lg px-4 py-2"
                    >

                        @foreach($users as $user)

                        <option
                            value="{{ $user->id }}"
                            {{ $task->assigned_to==$user->id?'selected':'' }}
                        >

                            {{ $user->name }}

                        </option>

                        @endforeach

                    </select>

                </div>


                <!-- Buttons -->
                <div class="flex gap-4">

                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow"
                    >
                        Save Changes
                    </button>

                    <a
                        href="{{ route('tasks.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 px-6 py-2 rounded-lg"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>
<x-app-layout>

    <div class="p-8">

        <div class="flex justify-between mb-6">

            <h1 class="text-2xl font-bold">Users</h1>

            <a href="{{ route('users.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">
                + Add User
            </a>

        </div>

        <table class="w-full border">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($users as $user)
                    <tr class="border-b">

                        <td class="p-3">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>

                            <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600">
                                Edit
                            </a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')

                                <button class="text-red-600 ml-2">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</x-app-layout>

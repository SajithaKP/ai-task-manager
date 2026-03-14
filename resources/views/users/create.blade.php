<x-app-layout>

    <div class="p-8 max-w-3xl mx-auto">

        <h1 class="text-2xl font-bold mb-6">Create User</h1>

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <input type="text" name="name" placeholder="Name" class="border p-2 w-full mb-4">

            <input type="email" name="email" placeholder="Email" class="border p-2 w-full mb-4">

            <input type="password" name="password" placeholder="Password" class="border p-2 w-full mb-4">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Create User
            </button>

        </form>

    </div>

</x-app-layout>

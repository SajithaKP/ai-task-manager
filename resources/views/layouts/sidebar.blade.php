<aside class="w-64 bg-gray-900 text-blue-300 min-h-screen shadow-lg">

    <div class="p-6 text-2xl font-bold border-b border-gray-700">
        TaskMaster
    </div>

    <nav class="mt-6">

        <a href="{{ route('dashboard') }}"
           class="block px-6 py-3 hover:bg-clay-700 transition">
            Dashboard
        </a>

        @if(auth()->user()->role === 'admin')
         <a href="{{ route('users.index') }}">
            User Management
        </a>
        <a href="{{ route('tasks.index') }}"
           class="block px-6 py-3 hover:bg-gray-700 transition">
            Task Management
        </a>

        @endif


        @if(auth()->user()->role === 'user')

       <a href="{{ route('tasks.index') }}"
           class="block px-6 py-3 hover:bg-gray-700 transition">
            My Tasks
        </a>

        @endif

    </nav>

</aside>
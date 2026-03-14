<x-app-layout>

<div class="p-8 max-w-4xl mx-auto">

    <!-- Back Button -->
    <a href="{{ route('tasks.index') }}"
       class="inline-block mb-6 text-blue-600 hover:text-blue-800 font-medium">
        ← Back to Tasks
    </a>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">

        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            {{ $task->title }}
        </h1>

        <!-- Description -->
        <p class="text-gray-600 mb-6">
            {{ $task->description }}
        </p>

        <!-- Task Info -->
        <div class="grid grid-cols-2 gap-6 mb-6">

            <div>
                <p class="text-sm text-gray-500">Priority</p>
                <span class="px-3 py-1 rounded-full text-sm font-medium
                    @if($task->priority=='high') bg-red-100 text-red-600
                    @elseif($task->priority=='medium') bg-yellow-100 text-yellow-600
                    @else bg-green-100 text-green-600
                    @endif">
                    {{ ucfirst($task->priority) }}
                </span>
            </div>

            <div>
                <p class="text-sm text-gray-500">Status</p>
                <span class="px-3 py-1 rounded-full text-sm font-medium
                    @if($task->status=='completed') bg-green-100 text-green-600
                    @elseif($task->status=='in_progress') bg-blue-100 text-blue-600
                    @else bg-yellow-100 text-yellow-600
                    @endif">
                    {{ str_replace('_',' ', ucfirst($task->status)) }}
                </span>
            </div>

        </div>

        <!-- AI Section -->
        <div class="bg-gray-50 rounded-lg p-5 border">

            <h2 class="text-lg font-semibold text-gray-700 mb-3">
                🤖 AI Insights
            </h2>

            <p class="text-gray-600 mb-3">
                <span class="font-medium">Summary:</span>
                {{ $task->ai_summary ?? 'No AI summary available' }}
            </p>

            <p class="text-gray-600">
                <span class="font-medium">AI Priority:</span>
                {{ $task->ai_priority ?? 'N/A' }}
            </p>

        </div>

    </div>

</div>

</x-app-layout>
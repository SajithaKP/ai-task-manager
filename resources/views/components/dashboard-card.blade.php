<div class="bg-white rounded-xl shadow-md p-6 border hover:shadow-lg transition">

    <div class="flex items-center justify-between">

        <div>
            <p class="text-gray-500 text-sm">
                {{ $title }}
            </p>

            <h2 class="text-3xl font-bold text-gray-800 mt-2">
                {{ $value }}
            </h2>
        </div>

        <div class="text-3xl">
            {{ $icon ?? '📊' }}
        </div>

    </div>

</div>
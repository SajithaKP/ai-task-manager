<x-app-layout>

    <div class="p-8 w-full">

        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-800">
                Dashboard
            </h1>
            <p class="text-gray-500 text-sm">
                Overview of your task management system
            </p>
        </div>


        @if (auth()->user()->role === 'admin')
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <!-- Total Tasks -->
                <div
                    class="bg-white rounded-xl shadow-lg p-6 flex items-center justify-between hover:shadow-xl transition">
                    <div>
                        <p class="text-gray-500 text-sm">Total Tasks</p>
                        <h2 class="text-3xl font-bold text-gray-800">{{ $stats['totalTasks'] }}</h2>
                    </div>

                    <div class="bg-blue-100 p-3 rounded-lg text-blue-600 text-xl">
                        📋
                    </div>
                </div>

                <!-- Completed -->
                <div
                    class="bg-white rounded-xl shadow-lg p-6 flex items-center justify-between hover:shadow-xl transition">
                    <div>
                        <p class="text-gray-500 text-sm">Completed</p>
                        <h2 class="text-3xl font-bold text-green-600">{{ $stats['completedTasks'] }}</h2>
                    </div>

                    <div class="bg-green-100 p-3 rounded-lg text-green-600 text-xl">
                        ✔
                    </div>
                </div>

                <!-- Pending -->
                <div
                    class="bg-white rounded-xl shadow-lg p-6 flex items-center justify-between hover:shadow-xl transition">
                    <div>
                        <p class="text-gray-500 text-sm">Pending</p>
                        <h2 class="text-3xl font-bold text-yellow-500">{{ $stats['pendingTasks'] }}</h2>
                    </div>

                    <div class="bg-yellow-100 p-3 rounded-lg text-yellow-600 text-xl">
                        ⏳
                    </div>
                </div>

                <!-- High Priority -->
                <div
                    class="bg-white rounded-xl shadow-lg p-6 flex items-center justify-between hover:shadow-xl transition">
                    <div>
                        <p class="text-gray-500 text-sm">High Priority</p>
                        <h2 class="text-3xl font-bold text-red-500">{{ $stats['highPriority'] }}</h2>
                    </div>

                    <div class="bg-red-100 p-3 rounded-lg text-red-600 text-xl">
                        🔥
                    </div>
                </div>

            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-10">

    <!-- Doughnut Chart -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-6">Task Analytics</h2>

        <div class="flex justify-center">
            <div class="w-80">
                <canvas id="taskChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Bar Chart -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-6">Task Status Overview</h2>

        <div class="flex justify-center">
            <div class="w-80">
                <canvas id="statusChart"></canvas>
            </div>
        </div>
    </div>

</div>
        @endif


        @if (auth()->user()->role === 'user')
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div
                    class="bg-white rounded-xl shadow-lg p-6 flex items-center justify-between hover:shadow-xl transition border-t-4 border-blue-500">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">My Total Tasks</p>
                        <h2 class="text-3xl font-bold text-gray-800">{{ $stats['totalTasks'] }}</h2>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-lg text-blue-600 text-2xl">
                        📋
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-lg p-6 flex items-center justify-between hover:shadow-xl transition border-t-4 border-green-500">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Completed</p>
                        <h2 class="text-3xl font-bold text-green-600">{{ $stats['completedTasks'] }}</h2>
                    </div>
                    <div class="bg-green-100 p-3 rounded-lg text-green-600 text-2xl">
                        ✔
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-lg p-6 flex items-center justify-between hover:shadow-xl transition border-t-4 border-yellow-400">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Pending</p>
                        <h2 class="text-3xl font-bold text-yellow-500">{{ $stats['pendingTasks'] }}</h2>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-lg text-yellow-600 text-2xl">
                        ⏳
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-lg p-6 flex items-center justify-between hover:shadow-xl transition border-t-4 border-red-500">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">High Priority</p>
                        <h2 class="text-3xl font-bold text-red-500">{{ $stats['highPriority'] }}</h2>
                    </div>
                    <div class="bg-red-100 p-3 rounded-lg text-red-600 text-2xl">
                        🔥
                    </div>
                </div>

            </div>
        @endif

    </div>


</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const completed = {{ $stats['completedTasks'] }};
const pending = {{ $stats['pendingTasks'] }};
const high = {{ $stats['highPriority'] }};


// Doughnut Chart
new Chart(document.getElementById('taskChart'),{
type:'doughnut',
data:{
labels:['Completed','Pending','High Priority'],
datasets:[{
data:[completed,pending,high],
backgroundColor:[
'#22c55e',
'#facc15',
'#ef4444'
]
}]
},
options:{
responsive:true,
plugins:{
legend:{
position:'top'
}
}
}
});


// Bar Chart
new Chart(document.getElementById('statusChart'),{
type:'bar',
data:{
labels:['Completed','Pending','High Priority'],
datasets:[{
label:'Tasks',
data:[completed,pending,high],
backgroundColor:[
'#22c55e',
'#facc15',
'#ef4444'
]
}]
},
options:{
responsive:true,
plugins:{
legend:{
display:false
}
},
scales:{
y:{
beginAtZero:true
}
}
}
});

</script>
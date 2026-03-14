<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {

            $stats = [
                'totalTasks' => Task::count(),
                'completedTasks' => Task::where('status','completed')->count(),
                'pendingTasks' => Task::where('status','pending')->count(),
                'highPriority' => Task::where('priority','high')->count(),
            ];

        } else {

            $stats = [
                'totalTasks' => Task::where('assigned_to',$user->id)->count(),
                'completedTasks' => Task::where('assigned_to',$user->id)->where('status','completed')->count(),
                'pendingTasks' => Task::where('assigned_to',$user->id)->where('status','pending')->count(),
                'highPriority' => Task::where('assigned_to',$user->id)->where('priority','high')->count(),
            ];
        }

        return view('dashboard', compact('stats'));
    }
}

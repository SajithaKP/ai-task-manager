<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Requests\StoreTaskApiRequest;
use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $repo;
    protected $service;

    public function __construct(
        TaskRepositoryInterface $repo,
        TaskService $service
    ){
        $this->repo = $repo;
        $this->service = $service;
    }

    // GET /api/tasks
    public function index()
    {
        $tasks = $this->repo->all();

        return TaskResource::collection($tasks);
    }

    // POST /api/tasks
    public function store(StoreTaskApiRequest $request)
    {
        $this->service->store($request->validated());

        return response()->json([
            'message' => 'Task created successfully'
        ], 201);
    }

    // PATCH /api/tasks/{id}/status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,completed'
        ]);

        $task = $this->repo->update($id, [
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'Task status updated',
            'data' => new TaskResource($task)
        ], 200);
    }

    // GET /api/tasks/{id}/ai-summary
    public function show($id)
    {
        $task = $this->repo->find($id);

        return response()->json([
            'ai_summary' => $task->ai_summary,
            'ai_priority' => $task->ai_priority
        ], 200);
    }
}
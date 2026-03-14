<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\User;
use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Services\TaskService;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    protected $service;
    protected $repo;

    public function __construct(
        TaskService $service,
        TaskRepositoryInterface $repo
    ){
        $this->service = $service;
        $this->repo = $repo;
    }

    // ADMIN → all tasks
    // USER → only their tasks
    public function index()
    {
        if(Auth::user()->role === 'admin'){
            $tasks = $this->repo->all();
        } else {
            $tasks = $this->repo->all([
                'assigned_to' => Auth::id()
            ]);
        }

        return view('tasks.index', compact('tasks'));
    }

    // ADMIN ONLY
    public function create()
    {
        if(Auth::user()->role !== 'admin'){
            abort(403);
        }
        $users = User::where('role','user')->get();

        return view('tasks.create', compact('users'));
    }

    public function store(StoreTaskRequest $request)
    {
        if(Auth::user()->role !== 'admin'){
            abort(403);
        }

        $this->service->store($request->validated());

        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        $task = $this->repo->find($id);

        return view('tasks.show', compact('task'));
    }

    // USER can change status
    public function updateStatus($id)
    {
        $task = $this->repo->find($id);

        if(Auth::user()->role === 'user' && $task->assigned_to !== Auth::id()){
            abort(403);
        }

        $this->repo->update($id, [
            'status' => request('status')
        ]);

        return back();
    }

    // edit task
    public function edit($id)
    {
        $task = $this->repo->find($id);

        if($task->status === 'completed'){
            return redirect()->route('tasks.index')
                ->with('error','Completed tasks cannot be edited');
        }

        $users = User::where('role','user')->get();

        return view('tasks.edit', compact('task','users'));
    }


    // update task
    public function update(StoreTaskRequest $request, $id)
    {
        $task = $this->repo->find($id);

        if($task->status === 'completed'){
            return back()->with('error','Completed task cannot be updated');
        }

        $this->repo->update($id, $request->validated());

        return redirect()->route('tasks.index');
    }


    // delete task
    public function destroy($id)
    {
        $task = $this->repo->find($id);

        if($task->status === 'completed'){
            return back()->with('error','Completed task cannot be deleted');
        }

        $this->repo->delete($id);

        return redirect()->route('tasks.index');
    }
}
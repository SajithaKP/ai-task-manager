<?php

namespace App\Services;
use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Services\AIService;

class TaskService
{
    protected $repo;
    protected $aiService;

    public function __construct(
        TaskRepositoryInterface $repo,
        AIService $aiService
    ){
        $this->repo=$repo;
        $this->aiService=$aiService;
    }

    public function store(array $data)
    {
        DB::transaction(function() use ($data){

            $task = $this->repo->create($data);

            $aiData = $this->aiService->generateSummary($task);

            $this->repo->update($task->id,$aiData);

        });
    }
}
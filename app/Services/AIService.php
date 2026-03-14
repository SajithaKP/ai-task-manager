<?php

namespace App\Services;

use App\Models\Task;

class AIService
{
    public function generateSummary(Task $task): array
    {
        // mock AI
        $summary = "Task '{$task->title}' needs attention. Priority: {$task->priority}.";

        return [
            'ai_summary' => $summary,
            'ai_priority' => $task->priority
        ];
    }
}
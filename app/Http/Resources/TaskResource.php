<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
   public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'priority'=>$this->priority,
            'status'=>$this->status,
            'due_date'=>$this->due_date,
            'assigned_to'=>$this->user->name,
            'ai_summary'=>$this->ai_summary,
            'ai_priority'=>$this->ai_priority,
        ];
    }
}

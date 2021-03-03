<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Comment as CommentResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'address' => $this->address,
            'status' => $this->status,
            'desired_date' => $this->desired_date,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => $this->user,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
        ];
    }
}

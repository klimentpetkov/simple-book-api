<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'title' => $this->title,
                'description' => $this->description,
                'cover' => $this->cover,
                'published_at' => $this->created_at->format('m/d/Y'), //diffForHumans(),
                'author' => User::make($this->author)
            ],
            'links' => [
                'self' => $this->path(),
            ]
        ];
    }
}

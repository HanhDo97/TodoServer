<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $todos = new TodoCollection($this->todos);
        return [
            "id"           => $this->id,
            "name"         => $this->name,
            "email"        => $this->email,
            "privilege_id" => $this->privilege_id,
            "created_at"   => $this->created_at,
            "updated_at"   => $this->updated_at,
            "todos"        => $todos
        ];
    }
}

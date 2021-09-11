<?php

namespace App\Http\Resources;

use App\Models\Project;
use App\Models\ProjectAssignment;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Collection;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mail' => $this->mail,
            'image' => $this->image,
            'role' => $this->role,
            'relationships' => [
                'projects' => $this->projects()->get()->map(
                    fn(Project $project) => $project->id
                )->all()
            ]
        ];
    }
}

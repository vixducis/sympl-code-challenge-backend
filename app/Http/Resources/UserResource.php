<?php

namespace App\Http\Resources;

use App\Models\ProjectAssignment;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Collection;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $projectAssignments = ProjectAssignment::where('user_id', $this->id)->get();
        /** @var Collection $projectAssignments */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mail' => $this->mail,
            'image' => $this->image,
            'role' => $this->role,
            'relationships' => [
                'projects' => $projectAssignments->map(
                    fn(ProjectAssignment $assignment) => (int)$assignment->project_id
                )->all()
            ]
        ];
    }
}

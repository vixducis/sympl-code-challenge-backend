<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * Returns the projects assigned to the user.
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function projects() 
    {
        return $this->hasManyThrough(
            Project::class, 
            ProjectAssignment::class,
            'user_id',
            'id',
            'id',
            'project_id'
        );
    }

    protected $fillable = ['name', 'mail', 'image', 'role'];
}

<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\ProjectAssignment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserResponse extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserResponse()
    {
        $user = User::create([
            'name' => 'Wouter',
            'image' => 'https://i.postimg.cc/3rGwkCKf/lenna.png',
            'role' => 'Developer',
            'mail' => 'wouter.henderickx@gmail.com'
        ]);

        $project = Project::create([
            'name' => 'Project 1',
            'color' => 'red'
        ]);

        ProjectAssignment::create([
            'user_id' => $user->id,
            'project_id' => $project->id
        ]);

        $this->get('/users')->assertExactJson(['data' => [[
            'id' => $user->id,
            'name' => 'Wouter',
            'image' => 'https://i.postimg.cc/3rGwkCKf/lenna.png',
            'role' => 'Developer',
            'mail' => 'wouter.henderickx@gmail.com',
            'relationships' => [
                'projects' => [$project->id]
            ]
        ]]]);
    }
}
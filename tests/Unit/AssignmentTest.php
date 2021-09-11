<?php

namespace Tests\Feature;

use App\Models\ProjectAssignment;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssignmentTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAssignmentUniqueConstraint() 
    {
        (new UserSeeder)->run();
        (new ProjectSeeder)->run();
        ProjectAssignment::create([
            'project_id' => 1,
            'user_id' => 1
        ]);

        $this->expectException(QueryException::class);
        ProjectAssignment::create([
            'project_id' => 1,
            'user_id' => 1
        ]);
    }
}
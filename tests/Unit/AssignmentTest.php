<?php

namespace Tests\Feature;

use App\Models\User;
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
        $user = User::find(1);
        if ($user !== null) {
            $user->projects()->attach(1);

            $this->expectException(QueryException::class);
            $user->projects()->attach(1);
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;

class ProjectAssignmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  int $userid
     * @param  int $projectid
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(int $userid, int $projectid)
    {
        $user = User::find($userid);
        if ($user === null) {
            return response()->json(
                ['error' => 'The user could not be found.'], 
                Response::HTTP_NO_CONTENT
            );
        }

        try {
            $user->projects()->attach($projectid);
        } catch(QueryException $e) {
            return response()->json(
                ['error' => 'The project is already assigned to the user.'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $userid
     * @param  int $projectid
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $userid, int $projectid)
    {
        $user = User::find($userid);
        if ($user === null) {
            return response()->json(
                ['error' => 'The user could not be found.'], 
                Response::HTTP_NO_CONTENT
            );
        }

        $user->projects()->detach($projectid);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

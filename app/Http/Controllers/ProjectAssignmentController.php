<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectAssignmentResource;
use App\Models\ProjectAssignment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;

class ProjectAssignmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  int $userid
     * @param  int $projectid
     * @return \Illuminate\Http\Response
     */
    public function store(int $userid, int $projectid)
    {
        try {
            $assignment = ProjectAssignment::create([
                'user_id' => $userid,
                'project_id' => $projectid
            ]);
        } catch(QueryException $e) {
            return response()->json(null, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return new ProjectAssignmentResource($assignment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $userid
     * @param  int $projectid
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $userid, int $projectid)
    {
        ProjectAssignment::where('user_id', $userid)
            ->where('project_id', $projectid)
            ->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

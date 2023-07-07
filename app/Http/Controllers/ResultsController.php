<?php

namespace App\Http\Controllers;

use App\Models\Results;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ResultsRequest;
use App\Http\Resources\ResultsResource;

class ResultsController extends Controller
{
    public function index()
    {
        return ResultsResource::collection(Results::all());
    }

    public function store(ResultsRequest $request, Results $user_id)
    {
        $result = Results::find($user_id);

        if ($result !== null && Auth::user()->id === $result->user_id) {
        $result = Results::create([
            'tournament_name' =>$request->tournament_name,
            'player_one_score' =>$request->player_one_score,
            'player_two_score' =>$request->player_two_score,
            'winner' =>$request->winner,
            'user_id' => $request->user_id
    ]);

        if ($result) {
        return response()->json([
            'status' => 200,
            'message' => 'Tournament result created successfully',
            'data' => $result
        ]);
    } else {
        return response()->json([
            'status' => 500,
            'message' => 'Can not create tournament result.'
        ]);
    }
} else {
    return response()->json([
        'status' => 403,
        'message' => 'You cannot create a tournament result.'
    ]);
}
}
    public function show(Results $results, $id)
    {
        $results = Results::find($id);
        if($results){
             return response()->json([
             'status' => 200,
             'message' => 'Successfully',
             'data' => $results,
             ]);
         }
    }

    public function update(ResultsRequest $request, $id)
    {
        $result = Results::find($id);

        if ($result !== null && Auth::user()->id === $result->user_id) {
        $result->update([
            'tournament_name' =>$request->tournament_name,
            'player_one_score' =>$request->player_one_score,
            'player_two_score' =>$request->player_two_score,
            'winner' =>$request->winner,
            'user_id' => $request->user_id
    ]);

        if ($result) {
        return response()->json([
            'status' => 200,
            'message' => 'Tournament result updated successfully',
            'data' => $result
        ]);
    } else {
        return response()->json([
            'status' => 500,
            'message' => 'Can not update tournament result.'
        ]);
    }
} else {
    return response()->json([
        'status' => 403,
        'message' => 'You cannot update a tournament result.'
    ]);
}
}

    public function destroy(Results $results, $id)
    {
        $result = Results::find($id);

        if ($result !== null && Auth::user()->id === $result->user_id) {
        $result->destroy();

        if ($result) {
        return response()->json([
            'status' => 200,
            'message' => 'Tournament result deleted successfully',
            'data' => $result
        ]);
    } else {
        return response()->json([
            'status' => 500,
            'message' => 'Can not delete tournament result.'
        ]);
    }
} else {
    return response()->json([
        'status' => 403,
        'message' => 'You cannot delete a tournament result.'
    ]);
}
    }
}

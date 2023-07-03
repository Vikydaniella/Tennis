<?php

namespace App\Http\Controllers;

use App\Models\Results;
use App\Http\Requests\ResultsRequest;
use App\Http\Resources\ResultsResource;

class ResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        return ResultsResource::collection(Results::all());
    }

    public function store(ResultsRequest $request)
    {
        $results = Results::create([
            'tournament_name' =>$request->tournament_name,
            'player_one_score' =>$request->player_one_score,
            'player_two_score' =>$request->player_two_score,
            'winner' =>$request->winner,
        ]);
        if ($results){
            return response()->json([
                'status' => 200,
                'message' => 'Game results registered successfully',
                'data' => $results
            ]);
    }
        return response()->json([
                'status' => 500,
                'message' => 'Can not register game result'
            ]);    
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

    public function update(ResultsRequest $request, Results $results, $id)
    {
        $results = Results::find($id);
        if($results){
            $results->update([
            'tournament_name' =>$request->tournament_name,
            'player_one_score' =>$request->player_one_score,
            'player_two_score' =>$request->player_two_score,
            'winner' =>$request->winner,
            ]);
            return response()->json([
            'status' => 200,
            'message' => 'Tournament updated successfully',
            'data' => $results,
            ]);
    }
        return response()->json([
            'status' => 500,
            'message' => 'Can not update tournament',
        ]);
    }

    public function destroy(Results $results, $id)
    {
        $results = Results::find($id);
        if ($results){
            $results->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Tournament deleted successfully',
                'data' => $results,
            ]);
    }
        return response()->json([
            'status' => 500,
            'message' => 'Can not delete tournament',
        ]);
    }
}

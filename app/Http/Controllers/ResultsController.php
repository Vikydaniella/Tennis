<?php

namespace App\Http\Controllers;

use App\Models\Tennis;
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

    public function store(ResultsRequest $request)
    {
        if (!Auth::user()) 
            return response()->json([
                'status' => 401,
                'message' => 'Unauthenticated.'
            ]);
        
        $tennis = Tennis::find($request->tournament_id);
        if ($tennis) {
            $tennis_creator_id = $tennis->id;
            if (Auth::user()->id == $tennis_creator_id) {
            
            $result = Results::firstOrCreate([
            'tournament_id' => $request->tournament_id,
            'player_one_score' => $request->player_one_score,
            'player_two_score' => $request->player_two_score,
            'winner' => $request->winner,
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
                'message' => 'Cannot create tournament result.'
            ]);
        }
        } 
        }else {
        return response()->json([
        'status' => 404,
        'message' => 'Tennis tournament not found.'
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
    
    if (!Auth::user()) 
            return response()->json([
                'status' => 401,
                'message' => 'Unauthenticated.'
            ]);
        
        $tennis = Tennis::find($request->tournament_id);
        if ($tennis) {
            $tennis_creator_id = $tennis->id;
            if (Auth::user()->id == $tennis_creator_id) {
            
                $result = Results::find($id);
                if($result){
                $result->update([
            'tournament_id' => $request->tournament_id,
            'player_one_score' => $request->player_one_score,
            'player_two_score' => $request->player_two_score,
            'winner' => $request->winner,
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
                'message' => 'Cannot update tournament result.'
            ]);
        }
        } 
        }else {
        return response()->json([
        'status' => 404,
        'message' => 'Tournament result not found.'
        ]);
        }
    }
}

    public function destroy(ResultsRequest $request, $id)
    {
        if (!Auth::user()) 
            return response()->json([
                'status' => 401,
                'message' => 'Unauthenticated.'
            ]);
        
        $tennis = Tennis::find($request->tournament_id);
        if ($tennis) {
            $tennis_creator_id = $tennis->id;
            if (Auth::user()->id == $tennis_creator_id) {
            
                $result = Results::find($id);
                if($result){
                $result->delete();

        if ($result) {
            return response()->json([
                'status' => 200,
                'message' => 'Tournament result deleted successfully',
                'data' => $result
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Cannot delete tournament result.'
            ]);
        }
        } 
        }else {
        return response()->json([
        'status' => 404,
        'message' => 'Tournament result not found.'
        ]);
        }
        }
    }
}
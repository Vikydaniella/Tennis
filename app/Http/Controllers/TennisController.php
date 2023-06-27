<?php

namespace App\Http\Controllers;

use App\Models\Tennis;
use App\Http\Requests\TennisRequest;
use App\Http\Resources\TennisResource;

class TennisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return TennisResource::collection(Tennis::all());
    }

    public function store(TennisRequest $request)
    {   
        $tennis = Tennis::create([
            'tournament_name' =>$request->tournament_name,
            'tournament_point' =>$request->tournament_point,
            'number_of_players' => $request->number_of_players
        ]);
        if ($tennis){
            return response()->json([
                'status' => 200,
                'message' => 'Tournament created successfully',
                'data' => $tennis
            ]);
    }
    
        return response()->json([
                'status' => 500,
                'message' => 'Can not create tournament'
            ]);    
    }

    public function show(Tennis $tennis, $id)
    {
       $tennis = Tennis::findOrFail($id);
       if($tennis){
            return new TennisResource($tennis);
        }
    }

    public function update(TennisRequest $request, Tennis $tennis, $id)
    {
        $tennis = Tennis::findOrFail($id);
        if($tennis){
            $tennis->update([
                'tournament_name' =>$request->tournament_name,
                'tournament_point' =>$request->tournament_point,
                'number_of_players' => $request->number_of_players
            ]);
            return response()->json([
            'status' => 200,
            'message' => 'Tournament updated successfully',
            'tennis' => $tennis,
            ]);
    }
        return response()->json([
            'status' => 500,
            'message' => 'Can not update tournament',
            'tennis' => $tennis,
        ]);
    }

    public function destroy(Tennis $tennis, $id)
    {
        $tennis = Tennis::findOrFail($id);
        if ($tennis){
            $tennis->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Tournament deleted successfully',
                'tennis' => $tennis,
            ]);
    }
        return response()->json([
            'status' => 500,
            'message' => 'Can not delete tournament',
            'tennis' => $tennis,
        ]);
    }
}

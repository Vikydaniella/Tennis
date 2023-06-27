<?php

namespace App\Http\Controllers;

use App\Models\Tennis;
use App\Http\Requests\TennisRequest;
use App\Http\Resources\TennisResource;
use App\Http\Requests\StoreTennisRequest;
use App\Http\Requests\UpdateTennisRequest;


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
        
        //return new TennisResource($tennis);
        return response()->json([
            'status' => 'success',
            'message' => 'Tournament created successfully',
            'tennis' => $tennis,
        ]);
    }

    public function show(Tennis $tennis, $id)
    {
       $tennis = Tennis::find($id);
       return new TennisResource($tennis);
    }

    public function update(TennisRequest $request, Tennis $tennis, $id)
    {
        $tennis = Tennis::find($id);
        $tennis->update([
            'tournament_name' =>$request->tournament_name,
            'tournament_point' =>$request->tournament_point,
            'number_of_players' => $request->number_of_players
            
        ]);
        //return new TennisResource($tennis);
        return response()->json([
            'status' => 'success',
            'message' => 'Tournament updated successfully',
            'tennis' => $tennis,
        ]);
    }

    public function destroy(Tennis $tennis, $id)
    {
        $tennis = Tennis::find($id);
        $tennis->delete();
        return response(null, 204);
        return response()->json([
            'status' => 'success',
            'message' => 'Tournament deleted successfully',
            'tennis' => $tennis,
        ]);
    }
}

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
        if ($request = $tennis);
        return response()->json([
            'status' => '201',
            'message' => 'Tournament created successfully',
            'tennis' => $tennis,
        ]);
        return response()->json([
            'status' => '406',
            'message' => 'Can not create tournament',
            'tennis' => $tennis,
        ]);
    }

    public function show(Tennis $tennis, $id)
    {
       $tennis = Tennis::findOrFail($id);
       return new TennisResource($tennis);
    }

    public function update(TennisRequest $request, Tennis $tennis, $id)
    {
        $tennis = Tennis::findOrFail($id);
        $tennis->update([
            'tournament_name' =>$request->tournament_name,
            'tournament_point' =>$request->tournament_point,
            'number_of_players' => $request->number_of_players
            
        ]);
        if ($request = $tennis)
        return response()->json([
            'status' => '205',
            'message' => 'Tournament updated successfully',
            'tennis' => $tennis,
        ]);
        return response()->json([
            'status' => '409',
            'message' => 'Can not update tournament',
            'tennis' => $tennis,
        ]);
    }

    public function destroy(Tennis $tennis, $id)
    {
        $tennis = Tennis::findOrFail($id);
        $tennis->delete();
        return response()->json([
            'status' => '204',
            'message' => 'Tournament deleted successfully',
            'tennis' => $tennis,
        ]);
        return response()->json([
            'status' => '409',
            'message' => 'Can not delete tournament',
            'tennis' => $tennis,
        ]);
    }
}

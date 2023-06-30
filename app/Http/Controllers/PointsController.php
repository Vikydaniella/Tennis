<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Points;
use App\Http\Requests\PointsRequest;
use App\Http\Resources\PointsResource;

class PointsController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        return PointsResource::collection(Points::all());
    }

    public function store(PointsRequest $request)
    {
        $points = Points::create([
            $request->id
        ]);
        if ($points){
            return response()->json([
                'status' => 200,
                'message' => 'Game results registered successfully',
                'data' => $points
            ]);
    }
        return response()->json([
                'status' => 500,
                'message' => 'Can not register game result'
            ]);    
    }

    public function show(Points $points, $id)
    {
        $points = Points::findOrFail($id);
        if($points){
             return response()->json([
             'status' => 200,
             'message' => 'Successfully',
             'data' => $points,
             ]);
         }
    }

    public function update(PointsRequest $request, Points $points, $id)
    {
        $points = Points::findOrFail($id);
        if($points){
            $points->update([
                $request->id
            ]);
            return response()->json([
            'status' => 200,
            'message' => 'Tournament updated successfully',
            'data' => $points,
            ]);
    }
        return response()->json([
            'status' => 500,
            'message' => 'Can not update tournament',
        ]);
    }

    public function destroy(Points $points, $id)
    {
        $results = Points::findOrFail($id);
        if ($points){
            $points->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Tournament deleted successfully',
                'data' => $points,
            ]);
    }
        return response()->json([
            'status' => 500,
            'message' => 'Can not delete tournament',
        ]);
    }
}


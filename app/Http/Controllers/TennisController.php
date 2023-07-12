<?php

namespace App\Http\Controllers;

use App\Models\Tennis;
use App\Http\Requests\TennisRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TennisResource;

class TennisController extends Controller
{
    public function index()
    {
        return TennisResource::collection(Tennis::all());
    }

    public function store(TennisRequest $request)
    {   
        $tennis = Tennis::firstOrCreate([
            'tournament_name' => $request->tournament_name,
            'tournament_point' => $request->tournament_point,
            'number_of_players' => $request->number_of_players,
            'user_id' => $request->user()->id
        ]);
        if ($tennis) {
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
       $tennis = Tennis::find($id);
       if($tennis){
            return response()->json([
            'status' => 200,
            'message' => 'Successful',
            'data' => $tennis,
            ]);
        }
        return response()->json([
            'status' => 500,
            'message' => 'Can not see tournament'
        ]);  
    }

    public function update(TennisRequest $request, $id)
    {
       $tennis = Tennis::find($id);
        if($tennis){
        $tennis->update([
            'tournament_name' => $request->tournament_name,
            'tournament_point' => $request->tournament_point,
            'number_of_players' => $request->number_of_players,
            'user_id' => $request->user()->id
        ]);
            return response()->json([
                'status' => 200,
                'message' => 'Tournament updated successfully',
                'data' => $tennis
            ]);
        }  
            return response()->json([
                'status' => 500,
                'message' => 'Can not update tournament'
            ]);

}

    public function destroy(Tennis $tennis, $id)
    {
         $tennis = Tennis::find($id);
        if ($tennis){
        $tennis->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Tournament updated successfully',
                'data' => $tennis
            ]);
        }  
            return response()->json([
                'status' => 500,
                'message' => 'Can not update tournament'
            ]);
    }
}
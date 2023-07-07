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

    public function store(TennisRequest $request, Tennis $user_id)
    {   
        $tennis = Tennis::find($user_id);

        if ($tennis !== null && Auth::user()->id === $tennis->user_id) {
        $tennis = Tennis::create([
        'tournament_name' => $request->tournament_name,
        'tournament_point' => $request->tournament_point,
        'number_of_players' => $request->number_of_players,
        'user_id' => $request->user_id
    ]);

        if ($tennis) {
        return response()->json([
            'status' => 200,
            'message' => 'Tournament created successfully',
            'data' => $tennis
        ]);
    } else {
        return response()->json([
            'status' => 500,
            'message' => 'Can not create tournament'
        ]);
    }
} else {
    return response()->json([
        'status' => 403,
        'message' => 'You cannot create a tournament.'
    ]);
}
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

    public function update(TennisRequest $request, int $id)
    {
        $tennis = Tennis::find($id);

        if ($tennis !== null && Auth::user()->id === $tennis->user_id) {
        $tennis->update([
        'tournament_name' => $request->tournament_name,
        'tournament_point' => $request->tournament_point,
        'number_of_players' => $request->number_of_players,
        'user_id' => $request->user_id
    ]);

        if ($tennis) {
        return response()->json([
            'status' => 200,
            'message' => 'Tournament updated successfully',
            'data' => $tennis
        ]);
    } else {
        return response()->json([
            'status' => 500,
            'message' => 'Can not update tournament'
        ]);
    }
} else {
    return response()->json([
        'status' => 403,
        'message' => 'You cannot update a tournament.'
    ]);
}

}

    public function destroy(Tennis $tennis, $id)
    {
        $tennis = Tennis::find($id);

        if ($tennis !== null && Auth::user()->id === $tennis->user_id) {
        $tennis->delete();
        if ($tennis) {
        return response()->json([
            'status' => 200,
            'message' => 'Tournament deleted successfully',
            'data' => $tennis
        ]);
    } else {
        return response()->json([
            'status' => 500,
            'message' => 'Can not delete tournament'
        ]);
    }
} else {
    return response()->json([
        'status' => 403,
        'message' => 'You cannot delete a tournament.'
    ]);
    }
}
}
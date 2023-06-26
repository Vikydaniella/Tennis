<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTennisRequest;
use App\Http\Requests\UpdateTennisRequest;
use App\Models\Tennis;
use App\Http\Resources\TennisResource;
use App\Http\Requests\TennisRequest;


class TennisController extends Controller
{
    public function index()
    {
        return TennisResource::collection(Tennis::all());

    }

    public function store(TennisRequest $request)
    {   
        $faker = \Faker\Factory::create(1);
        $tennis = Tennis::create([
        'tournament_name' => $faker->name,
        'tournament_point' => $faker->randomNumber,
        'number_of_players' => $faker->randomNumber,
        ]);
        
        return new TennisResource($tennis);
    }

    public function show(Tennis $tennis)
    {
        return new TennisResource($tennis);
    }

    public function update(TennisRequest $request, Tennis $tennis)
    {
        $tennis->update([
            'tournament_name' =>$request->input('name'),
            'tournament_point' =>$request->input('tournament_point'),
            'number_of_players' => $request->input('number_of_player')
            
        ]);
        return new TennisResource($tennis);
    }

    public function destroy(Tennis $tennis)
    {
        $tennis->delete();
        return response(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTennisRequest;
use App\Http\Requests\UpdateTennisRequest;
use App\Models\Tennis;
use App\Http\Resources\TennisResource;
use App\Http\Requests\TennisRequest;


class TennisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TennisResource::collection(Tennis::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTennisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTennisRequest $request)
    {
        $faker = \Faker\Factory::create(1);
        $tennis = Tennis::create([
            'tournament_name' => $faker->name,
            'tournament_point' => $faker->randomNumber,
            'number_of_players' => $faker->randomNumber,
        ]);
        return new TennisResource($tennis);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tennis  $tennis
     * @return \Illuminate\Http\Response
     */
    public function show(Tennis $tennis)
    {
        return new TennisResource($tennis);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tennis  $tennis
     * @return \Illuminate\Http\Response
     */
    public function edit(Tennis $tennis)
    {
        
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTennisRequest  $request
     * @param  \App\Models\Tennis  $tennis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTennisRequest $request, Tennis $tennis)
    {
        $tennis->update([
            'tournament_name' =>$request->input('name'),
            'tournament_point' =>$request->input('tournament_point'),
            'number_of_players' => $request->input('number_of_player')
            
        ]);
        return new TennisResource($tennis);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tennis  $tennis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tennis $tennis)
    {
        $tennis->delete();
        return response(null, 204);
    }
}

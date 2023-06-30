<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTennisPointsResultsRequest;
use App\Http\Requests\UpdateTennisPointsResultsRequest;
use App\Models\TennisPointsResults;

class TennisPointsResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTennisPointsResultsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTennisPointsResultsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TennisPointsResults  $tennisPointsResults
     * @return \Illuminate\Http\Response
     */
    public function show(TennisPointsResults $tennisPointsResults)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TennisPointsResults  $tennisPointsResults
     * @return \Illuminate\Http\Response
     */
    public function edit(TennisPointsResults $tennisPointsResults)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTennisPointsResultsRequest  $request
     * @param  \App\Models\TennisPointsResults  $tennisPointsResults
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTennisPointsResultsRequest $request, TennisPointsResults $tennisPointsResults)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TennisPointsResults  $tennisPointsResults
     * @return \Illuminate\Http\Response
     */
    public function destroy(TennisPointsResults $tennisPointsResults)
    {
        //
    }
}

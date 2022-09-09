<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSimRequest;
use App\Http\Requests\UpdateSimRequest;
use App\Models\Sim;

class SimController extends Controller
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
     * @param  \App\Http\Requests\StoreSimRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSimRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sim  $sim
     * @return \Illuminate\Http\Response
     */
    public function show(Sim $sim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sim  $sim
     * @return \Illuminate\Http\Response
     */
    public function edit(Sim $sim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSimRequest  $request
     * @param  \App\Models\Sim  $sim
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSimRequest $request, Sim $sim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sim  $sim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sim $sim)
    {
        //
    }
}

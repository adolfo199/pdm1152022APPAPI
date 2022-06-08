<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Curiosities;
use Illuminate\Http\Request;


class CuriositieController extends Controller
{
    public function index()
    {
        return "Hola";
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curiosities  $curiosities
     * @return \Illuminate\Http\Response
     */
    public function show(Curiosities $curiosities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curiosities  $curiosities
     * @return \Illuminate\Http\Response
     */
    public function edit(Curiosities $curiosities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curiosities  $curiosities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curiosities $curiosities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curiosities  $curiosities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curiosities $curiosities)
    {
        //
    }
}
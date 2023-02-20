<?php

namespace App\Http\Controllers;

use App\Models\pieces;
use Illuminate\Http\Request;

class piecesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pieces::all();
        return view('discover', compact('data'));
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
     * @param  \App\Models\pieces  $pieces
     * @return \Illuminate\Http\Response
     */
    public function show(pieces $pieces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pieces  $pieces
     * @return \Illuminate\Http\Response
     */
    public function edit(pieces $pieces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pieces  $pieces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pieces $pieces)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pieces  $pieces
     * @return \Illuminate\Http\Response
     */
    public function destroy(pieces $pieces)
    {
        //
    }
}

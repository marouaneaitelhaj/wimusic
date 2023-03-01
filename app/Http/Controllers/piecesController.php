<?php

namespace App\Http\Controllers;

use App\Models\pieces;
use App\Models\likedsongs;
use App\Models\playlists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;    

class piecesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($something = null)
    {
        $id = Auth::user()->id;
        $playlists = playlists::where('user_id','=', $id)->get();
        if (!$something == null) {
            $data = pieces::where('id', 'LIKE', '%' . $something . '%')
                ->orWhere('titre', 'LIKE', '%' . $something . '%')
                ->get();
        } else {
            $data = pieces::all();
        }
        return view('discover', compact('data','playlists'));
    }
    public function check($request){
        if(likedsongs::where('song_id', $request['id'])->where('user_id', $request['user_id'])->exists()){
            return 0;
        }else{
            return 1;
        }
    }
    public function liked(Request $request)
    {
        if (likedsongs::where('song_id', $request->id)->where('user_id', $request->user_id)->exists()) {
            likedsongs::where('song_id', $request->id)->where('user_id', $request->user_id)->delete();
            return redirect('./discover');
        } else {
            $liked = new likedsongs;
            $liked->song_id = $request->id;
            $liked->user_id = $request->user_id;
            $liked->save();
            return redirect('./discover');
        }
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

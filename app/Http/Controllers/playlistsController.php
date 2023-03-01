<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\playlists;
use App\Models\playlists_songs;
use Illuminate\Support\Facades\Auth as Auth;

class playlistsController extends Controller
{
    public function addplaylist()
    {
        return view('addplaylist');
    }
    public function store(Request $request)
    {
        $playlists = new playlists;
        $playlists->name = $request->name;
        $playlists->user_id = Auth::user()->id;
        $playlists->save();
        return redirect('./profile/' . Auth::user()->id);
    }
    public function addtoplaylist(Request $request)
    {
        dd($request->song_id);
        $playlistssongs = new playlists_songs;
        $playlistssongs->playlists_id = $request->playlists_id;
        $playlistssongs->song_id = $request->song_id;
        $playlistssongs->save();
        return redirect('./discover');
    }
}

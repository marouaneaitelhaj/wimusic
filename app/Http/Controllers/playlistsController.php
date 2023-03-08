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
    public function deletefromplaylis(Request $request)
    {
        $data = playlists_songs::where('playlists_id', '=', $request->playlists_id)->where('song_id', '=', $request->id)->delete();
        return back();
    }
    public function store(Request $request)
    {
        $playlists = new playlists;
        $playlists->name = $request->name;
        $playlists->user_id = Auth::user()->id;
        $playlists->save();
        return redirect('./profile/' . Auth::user()->id);
    }
    public function playlistSong(Request $request)
    {
        // $data = playlists_songs::where('playlists_id', '=', $request->playlistid)->get();
        $data = playlists_songs::where('playlists_id', '=', $request->playlistid)->join('pieces', 'song_id', '=', 'pieces.id')->get();
        // dd($data);
        return view('playlistSong', compact('data'));
    }
    public function addtoplaylist(Request $request)
    {
        $isexist = playlists_songs::where('playlists_id', '=', $request->playlists_id)->where('song_id', '=', $request->song_id)->first();
        if (!$isexist == null) {
            return back()->withErrors(['error' => 'This song is already in this playlist']);
        } else {
            $playlistssongs = new playlists_songs;
            $playlistssongs->playlists_id = $request->playlists_id;
            $playlistssongs->song_id = $request->song_id;
            $playlistssongs->save();
            return back()->withErrors(['success' => 'Song added to playlist']);
        }
    }
}

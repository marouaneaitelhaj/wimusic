<?php

namespace App\Http\Controllers;

use App\Models\pieces;
use App\Models\commenter;
use App\Models\playlists;
use App\Models\likedsongs;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class piecesController extends Controller
{
    public function ban($id)
    {
        $artiste = pieces::find($id);
        if ($artiste->ban == 1) {
            $artiste->update(['ban' => 0]);
        } else {
            $artiste->update(['ban' => 1]);
        }
        $artiste->save();
        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($something = null)
    {
        if (!auth()->guard('admin')->check()) {
            $id = Auth::user()->id;
            $playlists = playlists::where('user_id', '=', $id)->get();
            if (!$something == null) {
                $data = pieces::where('id', 'LIKE', '%' . $something . '%')
                    ->orWhere('titre', 'LIKE', '%' . $something . '%')
                    ->where('ban', 1)->get();
            } else {
                $data = pieces::where('ban', 1)->get();
            }
            return view('discover', compact('data', 'playlists'));
        } else {
            if (!$something == null) {
                $data = pieces::where('id', 'LIKE', '%' . $something . '%')
                    ->orWhere('titre', 'LIKE', '%' . $something . '%')
                    ->where('ban', 1)->get();
            } else {
                $data = pieces::where('ban', 1)->get();
            }

            return view('discover', compact('data'));
        }
    }
    public function single($id)
    {
        $user_id = Auth::user()->id;
        $commenter = commenter::where('song_id', $id)->get();
        // $commenter = commenter::where('song_id', $id)->join('users', 'commenter.user_id', '=', 'users.id')->get();
        $playlists = playlists::where('user_id', '=', $user_id)->get();
        $track = pieces::where('id', $id)->first();
        return view('single', compact('track', 'playlists', 'commenter'));
    }
    public function check($request)
    {
        if (likedsongs::where('song_id', $request['id'])->where('user_id', $request['user_id'])->exists()) {
            return 0;
        } else {
            return 1;
        }
    }
    public function likedsongs()
    {
        $user_id = Auth::user()->id;
        $data = likedsongs::where('user_id', $user_id)->join('pieces', 'likedsongs.song_id', '=', 'pieces.id')->get();
        return view('likedsongs', compact('data'));
    }
    public function liked(Request $request)
    {
        if (likedsongs::where('song_id', $request->id)->where('user_id', $request->user_id)->exists()) {
            likedsongs::where('song_id', $request->id)->where('user_id', $request->user_id)->delete();
            return back()->withErrors(['success' => 'Song removed from liked songs']);
        } else {
            $liked = new likedsongs;
            $liked->song_id = $request->id;
            $liked->user_id = $request->user_id;
            $liked->save();
            return back()->withErrors(['success' => 'Song added to liked songs']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addpieces');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pieces = $request->validate([
            'titre' => 'required|string|max:50',
            'artiste' => 'required|integer',
            'image_couverture' => 'required|mimes:jpeg,jpg,jfif,png|max:2048',
            'fichier_audio' => 'required|mimes:mp3,mp4|max:4048',
        ]);
        $image_couverture = Cloudinary::upload($request->file('image_couverture')->getRealPath())->getSecurePath();
        $fichier_audio = Cloudinary::upload($request->file('fichier_audio')->getRealPath(), ["resource_type" => "video"])->getSecurePath();
        $pieces = new pieces;
        $pieces->titre = $request->titre;
        $pieces->artiste_id = $request->artiste;
        $pieces->image_couverture = $image_couverture;
        $pieces->fichier_audio = $fichier_audio;
        $pieces->save();
        return back();
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
        pieces::where('id', $request->pieceid)->update(['titre' => $request->titre]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pieces  $pieces
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        pieces::where('id', $request->id)->delete();
        return back();
    }
}

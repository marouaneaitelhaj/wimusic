<?php

namespace App\Http\Controllers;

use App\Models\bandes;
use App\Models\artiste;
use App\Models\membres;
use Illuminate\Http\Request;
use Teapot\StatusCode\Vendor\CloudFlare;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class bandesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bandes = bandes::all();
        return view('bande', compact('bandes'));
    }
    public function dashboardBandes()
    {
        $artistes = artiste::all();
        $bandes = bandes::all();
        return view('dashboard', compact('bandes', 'artistes'));
    }
    public function addmember(Request $request)
    {
        $membres = $request->validate([
            'id_bande' => 'required',
            'id_membre' => 'required',
        ]);
        $membres = new membres();
        $membres->id_bande = $request->id_bande;
        $membres->id_membre = $request->id_membre;
        $membres->save();
        return back();
    }

    public function one($id)
    {
        $membres = membres::where('id_bande', $id)->join('artistes', 'membres.id_membre', '=', 'artistes.id')->get();
        $data = bandes::where('id', $id)->first();
        return view('onebande', compact('data', 'membres'));
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
        $bandes = $request->validate([
            'nom' => 'required|max:255',
            'pays' => 'required|max:255',
            'image' => 'required',
        ]);
        $bandes = new bandes();
        $bandes->nom = $request->nom;
        $bandes->pays = $request->pays;
        $url = Cloudinary::upload($request->image->getRealPath())->getSecurePath();
        $bandes->image = $url;
        $bandes->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $artiste = bandes::where('id', $request->id)->first();
        if ($artiste->ban == 1) {
            $artiste->update(['ban' => 0]);
        } else {
            $artiste->update(['ban' => 1]);
        }
        $artiste->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        bandes::where('id', $request->id)->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\artiste;
use App\Models\pieces;
use App\Models\toartistes;
use App\Http\Requests\StoreartisteRequest;
use App\Http\Requests\UpdateartisteRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ArtisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth('admin')->user());
        return view('index');
    }
    public function ToArtistes(Request $request)
    {
        $ToArtistes = $request->validate([
            'user_id'  => 'required|unique:toartistes,user_id'
        ]);
        $istoartistes =  toartistes::create($ToArtistes);
        if ($istoartistes) {
            return back()->with('success', 'Votre demande a été envoyée avec succès');
        } else {
            return back()->withErrors([
                'user_id' => ['Votre demande est déjà envoyée'],
            ]);
        }
    }

    public function artistes(artiste $artiste)
    {
        $data = artiste::where('ban', 1)->get();
        return view('artistes', compact('data'));
    }
    public function artiste(artiste $artiste)
    {
        $data = $artiste;
        $tracks = pieces::where('artiste_id', '=', $artiste->id)->get();
        return view('artiste', compact('data', 'tracks'));
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
     * @param  \App\Http\Requests\StoreartisteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreartisteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function show(artiste $artiste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        artiste::where('id', $request->id)->update(['nom' => $request->nom, 'pays' => $request->pays]);
        return back()->with('success', 'Votre demande a été envoyée avec succès');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateartisteRequest  $request
     * @param  \App\Models\artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateartisteRequest $request, artiste $artiste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function destroy(artiste $artiste)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\artiste;
use App\Models\pieces;
use App\Models\User;
use App\Models\toartistes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

class AdminController extends Controller
{
    public function convertToArtistes(Request $request)
    {
        $user = User::where('id', $request->user)->first();
        // dd($user->date_de_naissance);
        $artiste = new artiste();
        $artiste->nom = $user->name;
        $artiste->pays = $user->pays;
        $artiste->ban = 0;
        $artiste->date_de_naissance = $user->date_de_naissance;
        $artiste->image = $user->image;
        $artiste->save();
        User::where('id', $user->id)->update(['type' => 'artiste']);
        $toartistes = toartistes::where('user_id', $user->id)->delete();
        return back();
    }
    public function loginFront()
    {
        return view('signupadmin');
    }
    public function ban($id)
    {
        $artiste = artiste::find($id);
        if ($artiste->ban == 1) {
            $artiste->update(['ban' => 0]);
        } else {
            $artiste->update(['ban' => 1]);
        }
        $artiste->save();
        return redirect('dashboard/artistes');
    }
    public function artistes()
    {
        $data = artiste::all();
        return view('dashboard', compact('data'));
    }
    public function addartistes()
    {
        $toartistes = toartistes::join('users', 'toartistes.user_id', '=', 'users.id')->get();
        return view('dashboard' , compact('toartistes'));
    }
    public function pieces()
    {
        $artistes = artiste::all();
        $pieces = pieces::all();
        return view('dashboard', compact('pieces', 'artistes'));
    }
    public function login()
    {
        return view('loginadmin');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function logout()
    {
        auth('admin')->logout();
        return redirect('./');
    }
    public function check(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255|min:6'
        ]);
        // admin::create([
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            Auth::guard('admin')->login(admin::where('email', $request->email)->first());
            return redirect('dashboard');
        } else {
            return back()->withErrors([
                'err' => 'The provided credentials do not match our records.',
            ]);
        }
    }
}

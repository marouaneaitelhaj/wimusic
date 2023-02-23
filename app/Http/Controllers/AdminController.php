<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\artiste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
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
        return view('dashboard');
    }
    public function pieces()
    {
        return view('dashboard');
    }

    public function store()
    {
        $data =  request()->validate([
            'email' => 'required|email|max:255|unique:admins,email',
            'password' => 'required|max:255|min:6'
        ]);
        $data['password'] = bcrypt($data['password']);
        $admin = admin::create($data);
        Auth::guard('admin')->login($admin);
        session()->flash('done', 'your account has been credited');
        return redirect('./');
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
    public function check()
    {
        var_dump(request()->all());
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.account');
    }


    public function adminHome()
    {
        // return view('adminHome');
        $users = User::where("type","<>","admin")->orderBy('id','desc')->paginate("");
        $familles = User::where("type","famille")->orderBy('id','desc')->paginate("");
        $candidats = User::where("type","candidat")->orderBy('id','desc')->paginate("");
        return view('admin.adminHome', compact('users','familles','candidats'));
    }
    
    public function familleHome()
    {
        return view('familles.familleHome');
    }


    // public function indexfamille()
    // {
    //     // Utilisateur::where("nom","like","%{$searshbyname}%")->orderby("id","ASC")->paginate("");
    //     $famille = User::where("type","famille")->orderBy('id','desc')->paginate("");
    //     return view('adminHome', compact('famille'));
    // }

    
}

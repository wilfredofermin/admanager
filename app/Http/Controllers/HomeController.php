<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Adldap\Laravel\Facades\Adldap;

use Auth;

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

           $collection = collect(Adldap::search()->users()->find(Auth::user()->username));

         $filtered = $collection->only(['description']);
        return view('home')->with('filtered',json_decode($filtered));
    }
}

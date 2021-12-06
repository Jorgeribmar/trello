<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $lists = User::where('id', Auth::id())->first();
        //dd($lists);
        return view('home')->with(["user" => $lists]);
    }

}

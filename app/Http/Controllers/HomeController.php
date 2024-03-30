<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('components.main');
    }
    public function profile()
    {
        return view('components.profile');
    }
    public function servers()
    {
        $servers = DB::table('servers')
                    ->where('type', 'Shared')
                    ->get();
        return view('components.servers', ['servers' => $servers]);
    }
    
}

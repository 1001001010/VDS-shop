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
        $Shared_servers = DB::table('servers')->where('type', 'Shared')->get();
        $Delicated_servers = DB::table('servers')->where('type', 'Delicated')->get();
        return view('components.main', ['Shared_servers' => $Shared_servers, 'Delicated_servers' => $Delicated_servers]);
    }
    public function profile()
    {
        return view('components.profile');
    }
    public function servers()
    {
        $Shared_servers = DB::table('servers')->where('type', 'Shared')->get();
        $Delicated_servers = DB::table('servers')->where('type', 'Delicated')->get();
        $locations = DB::table('location')->get();
        return view('components.servers', ['Shared_servers' => $Shared_servers, 'Delicated_servers' => $Delicated_servers, 'locations' => $locations]);
    }
    
}

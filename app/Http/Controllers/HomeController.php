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
        // $Shared_servers = DB::table('servers')->where('type', 'Shared')->where('location', $region)->get();
        // $Delicated_servers = DB::table('servers')->where('type', 'Delicated')->where('location', $region)->get();
        // $locations = DB::table('location')->get();
        return view('components.main');
    }
    public function profile()
    {
        return view('components.profile');
    }
    public function servers($region)
    {
        $location = DB::table('location')->where('link', '=', $region)->first();
        $Shared_servers = DB::table('servers')->where('type', 'Shared')->where('location_id', $location->id)->get();
        $Delicated_servers = DB::table('servers')->where('type', 'Delicated')->where('location_id', $location->id)->get();
        $locations = DB::table('location')->get();
        // dd($region);
        return view('components.servers', ['Shared_servers' => $Shared_servers, 'Delicated_servers' => $Delicated_servers, 'locations' => $locations]);
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

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
    public function index($region)
    {
        $location = DB::table('location')->where('link', '=', $region)->first();
        $Shared_servers = DB::table('servers')->where('type', 'Shared')->where('location_id', $location->id)->where('status', '!=', 'active')->get();
        $Delicated_servers = DB::table('servers')->where('type', 'Delicated')->where('location_id', $location->id)->where('status', '!=', 'active')->get();
        $locations = DB::table('location')->get();
        return view('components.main', ['Shared_servers' => $Shared_servers, 'Delicated_servers' => $Delicated_servers, 'locations' => $locations]);
    }
    public function profile()
    {
        $user = Auth::user();
        $count_rent = DB::table('rentals')->where('user_id', $user->id)->whereIn('status', ['completed', 'active'])->count();
        $rent = DB::table('rentals')->where('user_id', $user->id)->whereIn('status', ['completed', 'active'])->get();
        return view('components.profile', ['count_rent' => $count_rent, 'rents' => $rent]);
    }
    public function servers($region)
    {
        $location = DB::table('location')->where('link', '=', $region)->first();
        $Shared_servers = DB::table('servers')->where('type', 'Shared')->where('location_id', $location->id)->where('status', '!=', 'active')->get();
        $Delicated_servers = DB::table('servers')->where('type', 'Delicated')->where('location_id', $location->id)->where('status', '!=', 'active')->get();
        $locations = DB::table('location')->get();
        return view('components.servers', ['Shared_servers' => $Shared_servers, 'Delicated_servers' => $Delicated_servers, 'locations' => $locations]);
    }
    
}

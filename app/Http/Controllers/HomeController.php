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
    public function index($region) {
        $location = DB::table('location')->where('link', '=', $region)->first();
        return view('components.main', [
            'Shared_servers' => DB::table('servers')->where('type', 'Shared')->where('location_id', $location->id)->where('status', '!=', 'active')->get(), 
            'Delicated_servers' => DB::table('servers')->where('type', 'Delicated')->where('location_id', $location->id)->where('status', '!=', 'active')->get(), 
            'locations' => DB::table('location')->get()
        ]);
    }
    public function profile() {
        $user = Auth::user();
        return view('components.profile', [
            'count_rent' => DB::table('rentals')->where('user_id', $user->id)->whereIn('status', ['completed', 'active'])->count(), 
            'rents' => DB::table('rentals')->where('user_id', $user->id)->whereIn('status', ['completed', 'active'])->get()
        ]);
    }
    public function ProfileRentals($rentals_id) {
        $user = Auth::user();
        $rental = DB::table('rentals')->where('id', '=', $rentals_id)->first();
        if ($user->id == $rental->user_id) {
            return view('components.rental_info', [
                'server' => DB::table('servers')->where('id', '=', $rental->server_id)->first(), 
                'rental' => $rental
            ]);
        } else {
            $message = 'Произошла внутренняя ошибка';
            return redirect()->back()->with('success', $message);
        }
    }
    public function servers($region) {
        $location = DB::table('location')->where('link', '=', $region)->first();
        return view('components.servers', [
            'Shared_servers' => DB::table('servers')->where('type', 'Shared')->where('location_id', $location->id)->where('status', '!=', 'active')->get(), 
            'Delicated_servers' => DB::table('servers')->where('type', 'Delicated')->where('location_id', $location->id)->where('status', '!=', 'active')->get(), 
            'locations' => DB::table('location')->get()
        ]);
    }
    
}

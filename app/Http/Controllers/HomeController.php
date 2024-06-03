<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\{Server, Rental, Location};

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
        $location = Location::where('link', $region)->first();
        return view('components.main', [
            'Shared_servers' => Server::where('type', 'Shared')->where('location_id', $location->id)->where('status', '!=', 'active')->get(), 
            'Delicated_servers' => Server::where('type', 'Delicated')->where('location_id', $location->id)->where('status', '!=', 'active')->get(), 
            'locations' => Location::all()
        ]);
    }
    public function profile() {
        $user = Auth::user();
        return view('components.profile', [
            'rents' => Rental::where('user_id', $user->id)->whereIn('status', ['completed', 'active'])->get()
        ]);
    }
    public function ProfileRentals($rentals_id) {
        $user = Auth::user();
        $rental = Rental::where('id', '=', $rentals_id)->first();
        if ($user->id == $rental->user_id) {
            return view('components.rental_info', [
                'server' => Server::where('id', '=', $rental->server_id)->first(), 
                'rental' => $rental
            ]);
        } else {
            return redirect()->back()->with('success', 'Произошла внутренняя ошибка');
        }
    }
    public function servers($region) {
        $location = Location::where('link', '=', $region)->first();
        return view('components.servers', [
            'Shared_servers' => Server::where('type', 'Shared')->where('location_id', $location->id)->where('status', '!=', 'active')->get(), 
            'Delicated_servers' => Server::where('type', 'Delicated')->where('location_id', $location->id)->where('status', '!=', 'active')->get(), 
            'locations' => Location::all()
        ]);
    }
    
}

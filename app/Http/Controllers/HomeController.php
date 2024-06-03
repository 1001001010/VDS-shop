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
        /**
        * Отображение главной страницы (регион)
        *
        * return страница components.main ($Shared_servers - список Shared серверов, $Delicated_servers - список Delicated серверов,
        *                                  $locations - список локаций)
        */
        $location = Location::where('link', $region)->first();
        return view('components.main', [
            'Shared_servers' => Server::where('type', 'Shared')->where('location_id', $location->id)->where('status', '!=', 'active')->get(), 
            'Delicated_servers' => Server::where('type', 'Delicated')->where('location_id', $location->id)->where('status', '!=', 'active')->get(), 
            'locations' => Location::all()
        ]);
    }
    public function profile() {
        /**
        * Отображение страницы профиля ()
        *
        * return страница components.profile ($rents - список аренд)
        */
        $user = Auth::user();
        return view('components.profile', [
            'rents' => Rental::where('user_id', $user->id)->whereIn('status', ['completed', 'active'])->get()
        ]);
    }
    public function ProfileRentals($rentals_id) {
        /**
        * Отображение страницы аренды (ID аренды)
        *
        * return страница components.rental_info ($server - информация о сервере, $rental - информация о аренде)
        */
        $user = Auth::user();
        $rental = Rental::where('id', $rentals_id)->first();
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
        /**
        * Отображение страницы серверов (регион)
        *
        * return страница components.servers ($Shared_servers - список Shared серверов, $Delicated_servers - список Delicated серверов,
        *                                     $locations - список локаций)
        */
        $location = Location::where('link', '=', $region)->first();
        return view('components.servers', [
            'Shared_servers' => Server::where('type', 'Shared')->where('location_id', $location->id)->where('status', '!=', 'active')->get(), 
            'Delicated_servers' => Server::where('type', 'Delicated')->where('location_id', $location->id)->where('status', '!=', 'active')->get(), 
            'locations' => Location::all()
        ]);
    }
    
}

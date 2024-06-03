<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Middleware\IsAdmin;

class LocationController extends Controller
{
    public function __construct() {
        $this->middleware([IsAdmin::class]);
        /**
        * Мидлвар проверки на админа
        */
    }
    
    public function deleteLocation(Request $request) {
        /**
        * Удаление локации (HTTP запрос)
        *
        * return предыдущая страница с уведомлением
        */
        Location::where('id', $request->location_id)->delete();
        return redirect()->back()->with('success', "Локация успешно удалена");
    }

    public function addLocation(Request $request) {
        /**
        * Добавление локации (HTTP запрос)
        *
        * return предыдущая страница с уведомлением
        */
        $validatedData = $request->validate([
            'location_name' => 'required|string',
            'location_link' => 'required|string',
        ]);

        $location = [
            'name' => $request->location_name,
            'link' => $request->location_link
        ];
        Location::create($location);
        return redirect()->back()->with('success', "Локация успешно добавлена");
    }
}

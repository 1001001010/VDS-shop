<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function deleteLocation(Request $request) {
        Location::where('id', $request->location_id)->delete();
        return redirect()->back()->with('success', "Локация успешно удалена");
    }
}

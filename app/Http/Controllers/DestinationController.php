<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestinationRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Destination;

class DestinationController extends Controller
{
    public function show(int $id, DestinationRequest $request)
    {

        $destination = Destination::find($id);

        $haversine = "6371 * acos( cos( radians($destination->lat) ) * cos( radians(lat) ) * cos( radians(lon) - radians($destination->lon)) + sin(radians($destination->lat)) * sin(radians(lat)) )";
        return DB::table('destinations')->selectRaw("id, name, lat, lon, $haversine AS distance")->whereRaw("$haversine < ?", [$request->get('radius')])->orderBy('distance', 'asc')->get();
    }
}

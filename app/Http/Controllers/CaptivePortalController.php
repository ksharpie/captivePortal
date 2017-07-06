<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class CaptivePortalController extends Controller
{
    public function index(Request $request, $location){

        $advertisements = Advertisement::join('stores', 'advertisements.store_id', '=', 'stores.id')
                        ->join('locations', 'stores.location_id', '=', 'locations.id')
                        ->select('stores.company_name', 'advertisements.offer', 'advertisements.expiry_date', 'advertisements.has_logo', 'advertisements.logo_path')
                        ->where('locations.location_name', '=', $location)
                        ->getQuery()
                        ->get();

        foreach ($advertisements as $advertisement)
        {
            if($advertisement->has_logo){
                $advertisement->logo_path = asset('storage/' . $advertisement->logo_path);
            }
        }

        $initialAdvertisement = mt_rand(0,count($advertisements)-1);

        return view('captivePortal.landing', compact('advertisements', 'initialAdvertisement'));
    }
}

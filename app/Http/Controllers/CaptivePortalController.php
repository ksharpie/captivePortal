<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use Carbon\Carbon;

class CaptivePortalController extends Controller
{
    public function index(Request $request, $location){

        $data = $request->all();
        $base_grant_url = isset($data['base_grant_url']) ? $data['base_grant_url']:'';
        $user_continue_url = isset($data['user_continue_url']) ? $data['user_continue_url']:'';

        $advertisements = Advertisement::join('stores', 'advertisements.store_id', '=', 'stores.id')
                        ->join('locations', 'stores.location_id', '=', 'locations.id')
                        ->select('stores.company_name', 'advertisements.offer', 'advertisements.expiry_date', 'advertisements.has_logo', 'advertisements.logo_path')
                        ->where('locations.location_name', '=', $location)
                        ->getQuery()
                        ->get();

        foreach ($advertisements as $advertisement)
        {
            if($advertisement->has_logo){
                $advertisement->logo_path = 'https://merakiwalledgarden2.blob.core.windows.net/advertisement-logos/' . $advertisement->logo_path;
            }
            $expirty_date = Carbon::createFromFormat('Y-m-d H', substr($advertisement->expiry_date,0,13));

            $advertisement->expires_in = $expirty_date->diffForHumans(Carbon::now(),true);
        }

        $initialAdvertisement = mt_rand(0,count($advertisements)-1);

        $clickThroughURL = $base_grant_url . "?continue_url=" . $user_continue_url . "&duration=3600";

        return view('captivePortal.landing', compact('advertisements', 'initialAdvertisement', 'clickThroughURL'));
        // return $clickThroughURL;
        // return $data;
    }
}

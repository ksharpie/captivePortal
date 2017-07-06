<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use App\Store;
use App\Location;
use Auth;

class StoresController extends Controller
{
    public function index(){

          $stores = Store::join('locations', 'stores.location_id', '=', 'locations.id')
                        ->select('locations.location_name', 'stores.company_name', 'stores.service_description', 'stores.id', 'stores.telephone_number', 'stores.website')
                        ->getQuery()
                        ->get();

          return view('stores.list', compact('stores'));
    }

    public function view(Store $store){

        if($store->has_logo){
            $store->logo_path = 'https://merakiwalledgarden2.blob.core.windows.net/advertisement-logos/' . $store->logo_path;
        }

        $locations = Location::all();

        return view('stores.view', compact('store', 'locations'));
    }

    public function create(Request $request){

        $this->validate($request, [
            'company_name' => 'required|unique:stores|max:255',
            'service_description' => 'required',
            'telephone_number' => 'required|max:15',
            'website' => 'required',
            'company_logo' => 'required|image',
            'location_id' => 'required|exists:locations,id'
        ]);

        $store = $request->toArray();

        if($request->hasFile('company_logo')){
            $path = $request->file('company_logo')->store('', 'azure');
            $store['has_logo'] = true;
            $store['logo_path'] = $path;
        }else{
            $store['has_logo'] = false;
        }

        $store['created_by'] = Auth::user()->id;

        $store = Store::create($store);

        return $this->index();
    }

    public function edit(Request $request, Store $store){

        $this->validate($request, [
            'company_name' => 'required|max:255',
            'service_description' => 'required',
            'telephone_number' => 'required|max:15',
            'website' => 'required',
        ]);

        $store->update($request->all());

        return $this->index();

    }

    public function delete(Store $store){
      $store->delete();

      return $this->index();
    }

    public function loadCreateStorePage(){

        $locations = Location::all();

        return view('stores.new', compact('locations'));
    }
}

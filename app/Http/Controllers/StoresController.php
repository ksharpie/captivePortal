<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use App\Store;

class StoresController extends Controller
{
    public function index(){

          $stores = Store::all();
          return view('stores.list', compact('stores'));
    }

    public function view(Store $store){

        if($store->has_logo){
            $store->logo_path = asset('storage/' . $store->logo_path);
        }

        return view('stores.view', compact('store'));
    }

    public function create(Request $request){

        $store = $request->toArray();

        if($request->hasFile('company_logo')){
            $path = $request->file('company_logo')->store('companyLogos', 'public');
            $store['has_logo'] = true;
            $store['logo_path'] = $path;
        }else{
            $store['has_logo'] = false;
        }

        $store = Store::create($store);

        return $store;
    }

    public function edit(Request $request, Store $store){

        $store->update($request->all());

        return back();

    }

    public function delete(Store $store){
      $store->delete();

      $stores = Store::all();

      return view('stores.list', compact('stores'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Auth;

class LocationsController extends Controller
{
  public function index(){
      $locations = Location::all();
      return view('locations.list', compact('locations'));
  }

  public function view(Location $location){

      return view('locations.view', compact('location'));
  }

  public function create(Request $request){

      $this->validate($request, [
          'location_name' => 'required|max:255',
          'location_address' => 'required|unique:locations|max:255',
      ]);

      $location = $request->toArray();

      $location['created_by'] = Auth::user()->id;

      $location = Location::create($location);

      $locations = Location::all();

      return view('locations.list', compact('locations'));
  }

  public function edit(Request $request, Location $location){

      $location->update($request->all());

      $locations = Location::all();

      return view('locations.list', compact('locations'));

  }

  public function delete(Location $location){
      $location->delete();

      $locations = Location::all();

      return view('locations.list', compact('locations'));
  }

  public function loadCreateLocationPage(){
    return view('locations.new');
  }
}

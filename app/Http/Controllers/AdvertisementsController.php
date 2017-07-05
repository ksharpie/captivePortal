<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Advertisement;
use Illuminate\Support\Facades\Log;

class AdvertisementsController extends Controller
{
    public function index(){
        $advertisements = Advertisement::all();
        return view('advertisements.list', compact('advertisements'));
    }

    public function view(Advertisement $advertisement){

        if($advertisement->has_logo){
            $advertisement->logo_path = asset('storage/' . $advertisement->logo_path);
        }
        return view('advertisements.view', compact('advertisement'));
    }

    public function create(Request $request){

        $this->validate($request, [
            'company_name' => 'required|max:255',
            'offer' => 'required',
            'expiry_date' => 'required|date',
            'category' => 'required',
            'advertisement_logo' => 'required|image',
        ]);

        $advertisement = $request->toArray();

        if($request->hasFile('advertisement_logo')){

          $path = $request->file('advertisement_logo')->store('advertisementLogos', 'public');
          $advertisement['has_logo'] = true;
          $advertisement['logo_path'] = $path;

        }else{
          $advertisement['has_logo'] = false;
        }

        $advertisement = Advertisement::create($advertisement);

        return $advertisement;
    }

    public function edit(Request $request, Advertisement $advertisement){

        $advertisement->update($request->all());

        $advertisements = Advertisement::all();

        return view('advertisements.list', compact('advertisements'));

    }

    public function delete(Advertisement $advertisement){
        $advertisement->delete();

        $advertisements = Advertisement::all();

        return view('advertisements.list', compact('advertisements'));
    }

    public function loadCreateAdvertisementPage(){

        return view('advertisements.new');
    }
}

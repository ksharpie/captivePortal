<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Advertisement;
use App\Store;
use Auth;

class AdvertisementsController extends Controller
{
    public function index(){
        $advertisements = Advertisement::join('stores', 'advertisements.store_id', '=', 'stores.id')
            ->select('stores.company_name', 'advertisements.id', 'advertisements.offer', 'advertisements.expiry_date', 'advertisements.category')
            ->getQuery()
            ->get();

        return view('advertisements.list', compact('advertisements'));
    }

    public function view(Advertisement $advertisement){

        if($advertisement->has_logo){
            $advertisement->logo_path = 'https://merakiwalledgarden2.blob.core.windows.net/advertisement-logos/' . $advertisement->logo_path;
        }

        $stores = Store::all();

        return view('advertisements.view', compact('advertisement', 'stores'));
    }

    public function create(Request $request, Filesystem $filesystem){

        $this->validate($request, [
            'store_id' => 'required|max:255',
            'offer' => 'required',
            'category' => 'required',
            'expiry_date' => 'required|date',
            'advertisement_logo' => 'required',
        ]);

        $advertisement = $request->toArray();

        if($request->hasFile('advertisement_logo')){

            $path = $request->file('advertisement_logo')->store('', 'azure');

            $advertisement['has_logo'] = true;
            $advertisement['logo_path'] = $path;

        }else{
          $advertisement['has_logo'] = false;
        }

        $advertisement['created_by'] = Auth::user()->id;

        $advertisement = Advertisement::create($advertisement);

        return $this->index();
    }

    public function edit(Request $request, Advertisement $advertisement){

        $advertisement->update($request->all());

        return $this->index();

    }

    public function delete(Advertisement $advertisement){
        if ( Storage::disk('azure')->exists( $advertisement->logo_path) )
        {
          Storage::disk('azure')->delete($advertisement->logo_path);
        }

        $advertisement->delete();

        return $this->index();

    }

    public function loadCreateAdvertisementPage(){
        $stores = Store::all();
        return view('advertisements.new', compact('stores'));
    }
}

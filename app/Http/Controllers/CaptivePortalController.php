<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptivePortalController extends Controller
{
    public function index(){

      return view('captivePortal.landing');
    }
}

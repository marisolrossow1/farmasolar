<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sunscreen;

class SunscreenController extends Controller
{

    
    public function index(){

        $allSunscreens = Sunscreen::with(['spf', 'brand', 'applications'])->get();

        //$allSunscreens = Sunscreen::all();

        return view('sunscreens.index', [
            'sunscreens' => $allSunscreens
        ]);
    }

    public function view(int $id) {
        return view('sunscreens.view', [
            'sunscreen' => Sunscreen::findOrFail($id)
        ]);
    }

    
}

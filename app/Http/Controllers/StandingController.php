<?php

namespace App\Http\Controllers;

use App\Models\Standing;
use Illuminate\Http\Request;

class StandingController extends Controller
{
    public function index(){

        $standings = Standing::get();

        return view('standing', [
            'standings' => $standings,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function userIndex(){
        $services = Service::all();
        return view('user.services', compact('services'));
    }
}
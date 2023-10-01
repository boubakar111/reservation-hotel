<?php

namespace App\Http\Controllers;

use App\Models\Models\Hotel;
use App\Models\Models\Reservation;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels')->with('hotels', $hotels);
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\reservationRequest;
use App\Models\Models\Hotel;
use App\Models\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with('chambre', 'chambre.hotel') ->orderBy('arrival', 'asc')->paginate(7);
        return view('dashboard.reservations' ,[
            'reservations'=> $reservations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($hotel_id)
    {
        $hotelInfo = Hotel::with('chambres')->get()->find($hotel_id);
        return view('dashboard.reservationCreate', compact('hotelInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Reservation $reservation)
    {
        $this->validate($request, [
            'room_id' => "required|",
            'num_of_guests' => "required",
            'arrival' => "required|",
            'departure' => "required"
        ]);
        $reservation->user_id = 1;
        $reservation->room_id = $request->input('room_id');
        $reservation->num_of_guests = $request->input('num_of_guests');
        $reservation->arrival = $request->input('arrival');
        $reservation->departure = $request->input('departure');
        $reservation->save();

        return redirect('dashboard/reservations')->with('success', 'Reservation created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        $reservation = Reservation::with('chambre', 'chambre.hotel')->get()->find($reservation->id);
        $hotel_id = $reservation->chambre->hotel_id;
        $hotelInfo = Hotel::with('chambres')->get()->find($hotel_id);

        return view('dashboard.reservationSingle', compact('reservation', 'hotelInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $reservation= Reservation::with('chambre','chambre.hotel')->get()->find($reservation->id);
        $hotel_id= $reservation->chambre->hotel_id;
        $hotelInfo = Hotel::with('chambres')->get()->find($hotel_id);
        return view('dashboard.reservationEdit', compact('reservation', 'hotelInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {   // il manque la validation des champs
        $reservation->user_id = 1;
        $reservation->room_id = $request->input('room_id');
        $reservation->num_of_guests = $request->input('num_of_guests');
        $reservation->arrival = $request->input('arrival');
        $reservation->departure = $request->input('departure');
        $reservation->save();
        return redirect('dashboard/reservations')->with('success', 'Successfully updated your reservation!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation = Reservation::find($reservation->id);
        $reservation->delete();

        return redirect('dashboard/reservations')->with('success', 'Successfully deleted your reservation!');
    }
}

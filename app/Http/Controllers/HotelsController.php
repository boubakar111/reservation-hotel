<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Models\Hotel;
use App\Models\Models\Location;
use App\Models\User;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        return view('dashboard.hotelCreate', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,Hotel $hotel)
    {
        // Utilisez la méthode extracData pour obtenir les données extraites
        $hotelData = $this->extracData($request ,$hotel);

        // Créez une nouvelle instance de modèle Hotel
        $hotel = new Hotel($hotelData);

        // Enregistrez l'objet modèle Hotel
        $hotel->save();

        return redirect('hotels')->with('success', 'Hotel created with success');
    }

    private function extracData(Request $request, Hotel $hotel)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        // Vérifiez si une image a été téléchargée
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('blog', 'public');

            if ($hotel->image!= null){
                Storage::disk('public')->delete($hotel->image);
            }

            $data['image'] = $imagePath;
        } else {
            // Si aucune image n'a été téléchargée, définissez une image par défaut
            $data['image'] = 'https://placeimg.com/640/480/arch';
        }

        return $data;
    }

    public function edit(Hotel $hotel)
    {
        $locations = Location::all();
        $hotel = $hotel->find($hotel->id);

        return view('dashboard.hotelEdit', compact('hotel', 'locations'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $hotelData = $this->extracData($request , $hotel);
        $hotel->update($hotelData);
        return redirect('hotels')->with('success', 'Hotel update with success');

    }
}

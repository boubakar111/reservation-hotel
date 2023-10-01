@extends('index')
@section('title', 'Reservations')
@section('content')
<div class="container mt-5">
    <h2>Your Reservations</h2>
    <table class="table mt-3">
        @if(!empty(Session::get('success')))
            <div class="alert alert-success"> {{ Session::get('success') }}</div>
        @endif
        @if(!empty(Session::get('error')))
            <div class="alert alert-danger"> {{ Session::get('error') }}</div>
        @endif
        <thead>
            <tr>
            <th scope="col">Hotel</th>
            <th scope="col">Arrival</th>
            <th scope="col">Departure</th>
            <th scope="col">Type</th>
            <th scope="col">Guests</th>
            <th scope="col">Price</th>
            <th scope="col">Manage</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)

            <tr>
               <td>{{ $reservation->chambre->hotel['name'] }}</td>
                <td>{{ $reservation->arrival }}</td>
                <td>{{ $reservation->departure }}</td>
                <td>{{ $reservation->chambre['type'] }}</td>
                <td>{{ $reservation->num_of_guests }}</td>
                <td>${{ $reservation->chambre['price'] }}</td>
            <td><a href="/dashboard/reservations/{{ $reservation->id }}/edit" class="btn btn-sm btn-success">Edit</a>
               <a href="/dashboard/reservations/show/{{ $reservation->id }}" class="btn btn-sm btn-primary">Show</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center mt-2">   {!! $reservations->links() !!} </div>
@endsection

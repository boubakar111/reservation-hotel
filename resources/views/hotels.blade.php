@extends('index')
@section('title', 'Hotels')
@section('content')
    <div class="container my-5">
        <div class="text-end mb-4">
            <a href="/dashboard/hotel/create" class="btn btn-success">Ajouter un Hotel </a>
        </div>
        <div class="row">
            <!-- Loop through hotels returned from controller -->
            @foreach ($hotels as $hotel)
                <div class="col-sm-3">
                    <div class="card mb-3">
                        @if($hotel->image)
                            <div
                                style="background-image:url('{{ $hotel->imagePath() }}');width:auto;height:300px;background-size:cover;"
                                class="img-fluid" alt="Front of hotel"></div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $hotel->name }}</h5>
                            <small class="text-muted">{{ $hotel->location }}</small>
                            <p class="card-text">{{ $hotel->description }}</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="/dashboard/reservations/create/{{ $hotel->id }}" class="btn btn-primary me-md-2">Book
                                    </a>
                                <a href="/dashboard/hotel/edit/{{ $hotel->id }}"
                                   class="btn btn-warning justify-content-md-end">edit</a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

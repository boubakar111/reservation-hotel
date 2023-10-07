@extends('index')
@section('title', 'Create hotel')
@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h2>{{ $hotel->name }} - <small class="text-muted">{{ $hotel->location }}</small></h2>
            </div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">ajouter un hotel </p>
                <form action="{{ route('hotel.update',$hotel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="guests">Hotel Name</label>
                                <input class="form-control" name="name" value="{{ old('name',$hotel->name) }}">
                                @error("name")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="hotel">Location</label>

                                <select class="form-control" name="location" value="{{ old('location', $hotel->location) }}">
                                    @foreach ($locations as $option)
                                        <option value="{{ $option->name }} - {{ $option->description }}">{{ $option->name }} - {{ $option->description }}</option>
                                    @endforeach
                                </select>
                                @error("location")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="departure">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error("image")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description">{{ old('description' ,$hotel->description) }}</textarea>
                                @error("description")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Book it</button>
                </form>
            </div>
        </div>
    </div>
@endsection

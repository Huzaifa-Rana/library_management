@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Dashboard</h1>
    
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Books</h5>
                    <p class="card-text">{{ $bookCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Authors</h5>
                    <p class="card-text">{{ $authorCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Total Rentals</h5>
                    <p class="card-text">{{ $rentalCount }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

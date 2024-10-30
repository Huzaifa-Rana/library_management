@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p><strong>Author:</strong> {{ $book->author->name }}</p>
    <p><strong>Publication Year:</strong> {{ $book->publication_year ?? 'N/A' }}</p>
    <p><strong>Availability:</strong> {{ $book->is_available ? 'Available' : 'Currently Rented' }}</p>

    <h2>Rental History</h2>
    @if($rentals->isEmpty())
        <p>No rental history available.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Renter Name</th>
                    <th>Rented At</th>
                    <th>Returned At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                    <tr>
                        <td>{{ $rental->renter_name }}</td>
                        <td>{{ $rental->rented_at }}</td>
                        <td>{{ $rental->returned_at ?? 'Not Returned' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($book->is_available)
        <form action="{{ route('rentals.rent', $book) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="renter_name">Renter Name</label>
                <input type="text" class="form-control" name="renter_name" required maxlength="255">
            </div>
            <button type="submit" class="btn btn-primary">Rent Book</button>
        </form>
    @else
        <p>This book is currently rented.</p>
    @endif

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books</a>
@endsection

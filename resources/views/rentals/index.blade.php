@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Rentals</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Book Title</th>
                <th>Renter Name</th>
                <th>Rented At</th>
                <th>Returned At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rentals as $rental)
                <tr>
                    <td>{{ $rental->id }}</td>
                    <td>{{ $rental->book->title }}</td>
                    <td>{{ $rental->renter_name }}</td>
                    <td>{{ $rental->rented_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        @if($rental->returned_at)
                            {{ $rental->returned_at->format('Y-m-d H:i:s') }}
                        @else
                            <span class="text-danger">Not Returned</span>
                        @endif
                    </td>
                    <td>
                        @if(is_null($rental->returned_at))
                            <form action="{{ route('rentals.return', $rental->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Return Book</button>
                            </form>
                        @else
                            <span class="text-success">Returned</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No rentals found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Book;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    // Display a listing of rentals
    public function index()
    {
        $rentals = Rental::with('book')->get();
        return view('rentals.index', compact('rentals'));
    }

    // Show the form for creating a new rental
    public function create()
    {
        $books = Book::where('is_available', true)->get();
        return view('rentals.create', compact('books'));
    }

    // Store a newly created rental in storage
    public function store(Request $request) {}

    // Display the specified rental
    public function show(Rental $rental)
    {
        return view('rentals.show', compact('rental'));
    }

    // Show the form for editing the specified rental
    public function edit(Rental $rental)
    {
        $books = Book::all();
        return view('rentals.edit', compact('rental', 'books'));
    }

    // Update the specified rental in storage
    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'renter_name' => 'required|string|max:255',
        ]);

        // Update rental
        $rental->update([
            'book_id' => $request->book_id,
            'renter_name' => $request->renter_name,
        ]);

        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully!');
    }

    // Remove the specified rental from storage
    public function destroy(Rental $rental)
    {
        // Mark the book as available when rental is deleted
        $book = $rental->book;
        $book->is_available = true;
        $book->save();

        $rental->delete();

        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully!');
    }

    //Rent the book

    public function rent(Request $request, Book $book)
    {
        if (!$book->is_available) {
            return redirect()->back()->withErrors('Book is currently unavailable');
        }

        $request->validate(['renter_name' => 'required|max:255']);

        Rental::create([
            'book_id' => $book->id,
            'renter_name' => $request->renter_name,
            'rented_at' => now(),
        ]);

        $book->update(['is_available' => false]);

        return redirect()->route('books.show', $book)->with('success', 'Book rented successfully');
    }

    // Return the book
    public function returnBook($id)
    {
        $rental = Rental::findOrFail($id);

        // Ensure that the rental is not already returned
        if ($rental->returned_at !== null) {
            return redirect()->route('rentals.index')->withErrors(['rental' => 'This book has already been returned.']);
        }

        // Mark rental as returned
        $rental->returned_at = now();
        $rental->save();

        // Mark the book as available
        $book = $rental->book;
        $book->is_available = true;
        $book->save();

        return redirect()->route('rentals.index')->with('success', 'Book returned successfully!');
    }
}

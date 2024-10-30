<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Rental;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $authorCount = Author::count();
        $rentalCount = Rental::count();

        return view('dashboard.index', compact('bookCount', 'authorCount', 'rentalCount'));
    }
}

@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $book->title }}" required maxlength="255">
        </div>
        <div class="form-group">
            <label for="author_id">Author</label>
            <select name="author_id" class="form-control" required>
                <option value="">Select Author</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="publication_year">Publication Year</label>
            <input type="number" class="form-control" name="publication_year" value="{{ $book->publication_year }}" maxlength="4" placeholder="YYYY">
        </div>
        <button type="submit" class="btn btn-success">Update Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

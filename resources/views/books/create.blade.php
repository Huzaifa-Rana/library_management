@extends('layouts.app')

@section('content')
    <h1>Add New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required maxlength="255">
        </div>
        <div class="form-group">
            <label for="author_id">Author</label>
            <select name="author_id" class="form-control" required>
                <option value="">Select Author</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="publication_year">Publication Year</label>
            <input type="number" class="form-control" name="publication_year" value="{{ old('publication_year') }}" maxlength="4" placeholder="YYYY">
        </div>
        <button type="submit" class="btn btn-success">Add Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

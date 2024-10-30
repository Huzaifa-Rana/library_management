@extends('layouts.app')

@section('content')
    <h1>Add New Author</h1>
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" required maxlength="255">
        </div>
        <button type="submit" class="btn btn-success">Add Author</button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

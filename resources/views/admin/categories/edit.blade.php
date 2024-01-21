@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-5">
            <h1 class="mb-4 text-center">Edit Category</h1>
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
                </div>
                <div class="mb-4">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="2">{{ old('description', $category->description) }}</textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary" value="Reset">
            </form>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

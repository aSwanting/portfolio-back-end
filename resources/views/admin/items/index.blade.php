@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="page-header mb-4">
            <h1 class="mb-3">List of Database Items</h1>
            <a href="{{ route('admin.items.create') }}" class="btn btn-outline-primary">ADD ENTRY</a>
        </div>
        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Category</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ route('admin.items.show', $item) }}">{{ $item->name }}</a></td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->category?->name }}</td>
                        <td><a class="btn btn-sm btn-outline-success" href="{{ route('admin.items.edit', $item) }}">edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.items.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-sm btn-outline-danger" type="submit" value="delete">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center fw-bold">Database is empty?!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

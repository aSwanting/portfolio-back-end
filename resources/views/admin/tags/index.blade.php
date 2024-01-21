@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="page-header mb-4">
            <h1 class="mb-3">List of Database Tags</h1>
            <a href="{{ route('admin.tags.create') }}" class="btn btn-outline-primary">ADD ENTRY</a>
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
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td><a href="{{ route('admin.tags.show', $tag) }}">{{ $tag->name }}</a></td>
                        <td>{{ $tag->slug }}</td>
                        <td><a class="btn btn-sm btn-outline-success" href="{{ route('admin.tags.edit', $tag) }}">edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
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

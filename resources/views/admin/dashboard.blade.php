@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">Database Items</div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ route('admin.items.show', $item) }}">{{ $item->name }}</a></td>
                                        @if ($item->category)
                                            <td>
                                                <a
                                                    href="{{ route('admin.categories.show', $item->category) }}">{{ $item->category->name }}</a>
                                            </td>
                                        @else
                                            <td>-</td>
                                        @endif
                                    </tr>
                                @empty
                                @endforelse
                                <tr></tr>
                            </tbody>
                        </table>
                        {{ $items->links() }}
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">Database Categories</div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td><a
                                                href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                <tr></tr>
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">Database Tags</div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                @forelse ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td><a href="{{ route('admin.tags.show', $tag) }}">{{ $tag->name }}</a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                <tr></tr>
                            </tbody>
                        </table>
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

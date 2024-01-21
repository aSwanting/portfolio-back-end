@extends('layouts.app')

@section('content')
    <div class="container p-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card shadow">

            <div class="card-header p-5">
                <p class="text-end badge rounded-pill shadow bg-secondary p-2">N° {{ $category->id }}</p>
                <h3 class="display-4 mb-0">{{ $category->name }}</h3>
                <p class="fst-italic">{{ $category->slug }}</p>
            </div>

            <div class="card-body p-5">
                <p class="fs-5">{{ $category->description }}</p>
            </div>

            <div class="card-footer p-5">
                <div class="d-flex fst-italic fw-lighter justify-content-evenly">
                    <p class="mb-0">created: {{ $category->created_at }}</p>
                    <p class="mb-0">updated: {{ $category->updated_at }}</p>
                </div>
            </div>

        </div>
    </div>
@endsection

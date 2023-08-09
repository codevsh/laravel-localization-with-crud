@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card mb-3">
                    <img src="{{ Storage::url($post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <div class="d-flex border-bottom mb-4">
                            <small class="text-secondary me-3">Category: <span
                                    class="text-dark">{{ $post->category->title }}</span></small>
                            <small
                                class="text-secondary me-3">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                        </div>
                        <p class="card-text">{{ $post->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('main.ink.sidebar')
            </div>
        </div>
    </div>
@endsection

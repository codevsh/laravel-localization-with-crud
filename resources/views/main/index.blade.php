@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card text-white bg-dark p-2 text-white">
                    <div class="card-body text-dark">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb text-dark">

                                <li class="breadcrumb-item text-white"> <i class="fas fa-home fa-xs text-white me-2"></i><a
                                        class="text-light"
                                        href="{{ route('main.index', app()->getLocale()) }}">{{ __('Home') }}</a>
                                </li>
                                {{-- <li class="breadcrumb-item active" aria-current="page">{{ __('Posts') }}</li> --}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ Storage::url($post->image) }}" class="img-fluid rounded-start"
                                        alt="{{ $post->title }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">
                                            {{ mb_strimwidth($post->description, 0, 160, '(...)') }}
                                        </p>
                                        <p class="card-text"><small
                                                class="text-muted">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-dark text-center">{{ __('Posts not found') }}</p>
                @endif
            </div>
            <div class="col-md-3">
                @include('main.ink.sidebar')
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection

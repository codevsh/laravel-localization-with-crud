@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card text-white bg-secondary p-2 text-white bg-opacity-25 ">
                    <div class="card-body text-dark">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb text-dark">

                                <li class="breadcrumb-item text-dark">
                                    <i class="fas fa-home fa-xs text-dark me-2"></i>
                                    <a class="text-dark"
                                        href="{{ route('main.index', app()->getLocale()) }}">{{ __('Home') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Category') }} :
                                    {{ $category->title }}</li>
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
                        <div class="card mb-3" >
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ Storage::url($post->image) }}" class="img-fluid rounded-start" alt="{{ $post->title }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">
                                            {{ mb_strimwidth($post->description, 0, 160, '(...)') }}
                                        </p>
                                        <p class="card-text"><small class="text-muted">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card mb-3">
                            <img src="{{ Storage::url($post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">{{ $post->title }}</h4>
                                <p class="card-text">{{ mb_strimwidth($post->description, 0, 180, '(...)') }}</p>
                                <a href="{{ route('main.show',[ app()->getLocale(), $post]) }}" class="btn btn-dark ms-auto">{{ __('Read more...') }}</a>
                            </div>
                        </div> --}}
                    @endforeach
                @else
                    <p class="text-dark text-center">{{ __('Categories not found') }}</p>
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

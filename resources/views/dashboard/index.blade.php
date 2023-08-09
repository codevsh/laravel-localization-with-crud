@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    @include('dashboard.inc.sidebar')
                </div>
            </div>
            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <span class="mb-3 d-flex justify-content-center w-100">
                                        <i class="fas fa-users fa-2x"></i>
                                    </span>
                                    <h4 class="card-title">{{ __('Users') }}</h4>
                                    <p class="card-text">{{ __('Users count:') }}</p>
                                    <div class="card-footer d-grid"><a href="#" class="btn text-white">{{ __('Read More') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-success">
                                <div class="card-body">
                                    <span class="mb-3 d-flex justify-content-center w-100">
                                        <i class="fas fa-list-alt fa-2x"></i>
                                    </span>
                                    <h4 class="card-title">{{ __('Categories') }}</h4>
                                    <p class="card-text">{{ __('Categories count:') }}</p>
                                    <div class="card-footer d-grid"><a href="#" class="btn text-white">{{ __('Read More') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-info">
                                <div class="card-body">
                                    <span class="mb-3 d-flex justify-content-center w-100">
                                        <i class="fas fa-sticky-note fa-2x"></i>
                                    </span>
                                    <h4 class="card-title">{{ __('Posts') }}</h4>
                                    <p class="card-text">{{ __('Posts count:') }}</p>
                                    <div class="card-footer d-grid"><a href="#" class="btn text-white">{{ __('Read More') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

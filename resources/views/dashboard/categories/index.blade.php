@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card text-white bg-light ">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.index', app()->getLocale()) }}">{{ __('Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Categories') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- SideBar --}}
            <div class="col-md-4">

                @include('dashboard.inc.sidebar')
            </div>
            {{-- mainContent --}}
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12">
                        @if (session('status'))
                            <div class="card">
                                <div class="card-body">
                                    @if (session('status') == 'success')
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @else
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('categories.create', app()->getLocale()) }}"
                                    class="btn btn-dark btn-sm">{{ __('Add new category') }}</a>
                            </div>
                            <div class="card-body">
                                <p class="text-dark">{{ __('Categories count:') }} {{ $categories->count() }}</p>
                                @if ($categories->count() > 0)
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>{{ __('Category title') }}</th>
                                                <th colspan="3">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td scope="row">{{ $category->id }}</td>
                                                    <td>{{ $category->title }}</td>
                                                    <td><a href="{{ route('categories.show', [app()->getLocale(), $category]) }}"
                                                            class="btn btn-primary btn-sm">{{ __('Show') }}</a>
                                                    </td>
                                                    <td><a href="{{ route('categories.edit', [app()->getLocale(), $category]) }}"
                                                            class="btn btn-success btn-sm">{{ __('Edit') }}</a>
                                                    </td>
                                                    <td>
                                                        <form
                                                            action="{{ route('categories.destroy', [app()->getLocale(), $category]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                        </tbody>
                                    </table>
                                    <tr>
                                        <h3>{{ __('Categories not found') }}</h3>
                                    </tr>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

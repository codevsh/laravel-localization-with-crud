@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card text-white bg-light ">
                    <div class="card-body">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index', app()->getLocale()) }}">{{ __('Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Posts') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- SideBar --}}
            <div class="col-md-3 ">
                @include('dashboard.inc.sidebar')
            </div>
            {{-- mainContent --}}
            <div class="col-md-9">
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
                                <a href="{{ route('posts.create', app()->getLocale()) }}"
                                    class="btn btn-dark btn-sm">{{ __('Add new post') }}</a>
                            </div>
                            <div class="card-body">
                                <p class="text-dark">{{ __('Posts count:') }} {{ $posts->count() }}</p>
                                @if ($posts->count() > 0)
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>{{ __('Image') }}</th>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Category') }}</th>
                                                <th>{{ __('Description') }}</th>
                                                <th colspan="3">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <td scope="row">{{ $post->id }}</td>
                                                    <td><img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-75"></td>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ $post->category->title }}</td>
                                                    <td>{{ mb_strimwidth($post->description, 0, 100, '(...)') }}</td>
                                                    <td><a href="{{ route('posts.show', [ app()->getLocale(), $post]) }}"
                                                            class="btn btn-primary btn-sm">{{ __('Show') }}</a>
                                                    </td>
                                                    <td><a href="{{ route('posts.edit', [ app()->getLocale(), $post]) }}"
                                                            class="btn btn-success btn-sm">{{ __('Edit') }}</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('posts.destroy', [ app()->getLocale(), $post]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $posts->links() }}
                                @else
                                    <h3 class="text-center">{{ __('Posts not found') }}</h3>
                                @endif

                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

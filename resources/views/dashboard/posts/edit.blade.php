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
                                <li class="breadcrumb-item"><a
                                        href="{{ route('posts.index', app()->getLocale()) }}">{{ __('Posts') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Edit') }}</li>
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
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('posts.update', [app()->getLocale(), $post]) }}" method="Post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group mb-3">
                                        <label for="title">{{ __('Title') }}</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') border-danger @enderror"
                                            value="{{ $post->title }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">{{ __('Category') }}</label>
                                        <select class="form-control @error('category_id') border-danger @enderror"
                                            name="category_id">
                                            <option>--== Select Ctegory ==--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $post->category_id == $category->id ? ' selected' : '' }}>
                                                    {{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">{{ __('Description') }}</label>
                                        <textarea class="form-control  @error('title') border-danger @enderror" name="description" rows="3">{{ $post->description }}</textarea>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <img class="w-25 my-3" src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control @error('image') border-danger @enderror"
                                            id="inputGroupFile02" name="image">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-dark">{{ __('Update') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

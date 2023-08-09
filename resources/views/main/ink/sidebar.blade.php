<div class="card mb-3" style="height:75vh;">
    <div class="card-header">
        {{ __('Categories') }}
    </div>
    @if ($categories->count() > 0)
        <nav class="nav flex-column">
            @foreach ($categories as $category)
                <a href="{{ route('main.category', [app()->getLocale(), $category]) }}" class="nav-link">{{ $category->title }}</a>
            @endforeach
        </nav>
    @else
        <p class="text-dark text-center">{{ __('Categories not found') }}</p>
    @endif

</div>

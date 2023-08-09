<nav class="nav flex-column"  style="height: 75vh">
    <li class="nav-item d-flex align-items-center py-2 px-3">
        <i class="fas fa-list fa-lg me-1 text-secondary"></i>
        <a href="{{ route('categories.index', app()->getLocale()) }}" class="nav-link">{{ __('Categories') }}</a>
    </li>
    <li class="nav-item d-flex align-items-center py-2 px-3">
        <i class="fas fa-sticky-note fa-lg me-1 text-secondary"></i>
        <a href="{{ route('posts.index', app()->getLocale()) }}" class="nav-link">{{ __('Posts') }}</a>
    </li>
</nav>

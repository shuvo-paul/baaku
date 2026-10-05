@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('dashboard.pagination') }}" class="mt-10 flex items-center justify-between">
        @if ($paginator->onFirstPage())
            <span class="btn-secondary pointer-events-none opacity-40" aria-disabled="true">
                <span aria-hidden="true">←</span> {{ __('dashboard.previous') }}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn-secondary">
                <span aria-hidden="true">←</span> {{ __('dashboard.previous') }}
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn-secondary">
                {{ __('dashboard.next') }} <span aria-hidden="true">→</span>
            </a>
        @else
            <span class="btn-secondary pointer-events-none opacity-40" aria-disabled="true">
                {{ __('dashboard.next') }} <span aria-hidden="true">→</span>
            </span>
        @endif
    </nav>
@endif

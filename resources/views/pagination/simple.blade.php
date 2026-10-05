@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('activity_log.pagination') }}" class="mt-10 flex items-center justify-between">
        @if ($paginator->onFirstPage())
            <span class="btn-secondary pointer-events-none opacity-40" aria-disabled="true">
                <span aria-hidden="true">←</span> {{ __('activity_log.newer') }}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn-secondary">
                <span aria-hidden="true">←</span> {{ __('activity_log.newer') }}
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn-secondary">
                {{ __('activity_log.older') }} <span aria-hidden="true">→</span>
            </a>
        @else
            <span class="btn-secondary pointer-events-none opacity-40" aria-disabled="true">
                {{ __('activity_log.older') }} <span aria-hidden="true">→</span>
            </span>
        @endif
    </nav>
@endif

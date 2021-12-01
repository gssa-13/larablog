@if ($paginator->hasPages())
    <ul class="actions pagination">
        @if ($paginator->onFirstPage())
            <li><a href="" class="disabled button large previous">{!! __('pagination.previous') !!}</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="button large previous">{!! __('pagination.previous') !!}</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><a class="disabled button large previous">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a class="disabled button large previous">{{ $page }}</a></li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="button large previous"
                               aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="button large previous">{!! __('pagination.next') !!}</a></li>
        @else
            <li><a href="" class="disabled button large previous">{!! __('pagination.next') !!}</a></li>
        @endif
    </ul>
@endif

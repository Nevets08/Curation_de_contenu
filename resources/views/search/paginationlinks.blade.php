@if ($paginator->hasPages())
    <ul class="pagination">
        <!-- Page precedente -->
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link">Page précedente</a></li>
        @else
            <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link"
                    rel="prev">Page
                    précedente</a></li>
        @endif

        <!--Element pagination  -->
        @foreach ($elements as $element)
            <!-- trois petits points... -->
            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link"><span>{{ $element }}</span></a></li>
            @endif

            <!-- tableau de liens -->
            @if (is_array($element))
                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link"><span>{{ $page }}</span></a></li>
                    @else
                        <li class="page-item"><a href="{{ $url }}"
                                class="page-link">{{ $page }}</a>
                        </li>
                    @endif

                @endforeach
            @endif

        @endforeach

        <!-- page suivante -->
        @if ($paginator->hasMorePages())
            <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link">Page suivante</a>
            </li>
        @else
            <li class="page-item disabled"><a class="page-link">Page suivante</a></li>
        @endif
    </ul>

@endif

@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            {{-- Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif
        </ul>
    </nav>
@endif

<style>
.pagination .page-link {
    color: #1f993d;
    border: 1px solid #1f993d;
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 6px;
    margin: 0 3px;
    transition: all 0.2s;
}
.pagination .page-link:hover {
    background-color: #28c76f;
    border-color: #28c76f;
    color: #fff;
}
.pagination .page-item.active .page-link {
    background-color: #1f993d;
    border-color: #1f993d;
    color: #fff;
}
.pagination .page-item.disabled .page-link {
    color: #999;
    border-color: #ccc;
    background: #f9f9f9;
}
</style>

@if ($paginator->hasPages())
<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="paginate_button page-item previous disabled">
            <a class="page-link">«</a>
        </li>
    @else
        <li class="paginate_button page-item previous">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a>
        </li>
    @endif

    @if($paginator->currentPage() > 3)
        <li class="paginate_button page-item">
            <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
        </li>
    @endif
    @if($paginator->currentPage() > 4)
        <li class="paginate_button page-item">
            <a class="page-link">...</a>
        </li>
    @endif
    @foreach(range(1, $paginator->lastPage()) as $i)
        @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
            @if ($i == $paginator->currentPage())
                <li class="paginate_button page-item active">
                    <a class="page-link">{{ $i }}</a>
                </li>
            @else
                <li class="paginate_button page-item">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endif
    @endforeach
    @if($paginator->currentPage() < $paginator->lastPage() - 3)
        <li class="paginate_button page-item">
            <a class="page-link">...</a>
        </li>
    @endif
    @if($paginator->currentPage() < $paginator->lastPage() - 2)
        <li class="paginate_button page-item">
            <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
        </li>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="paginate_button page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">»</a>
        </li>
    @else
        <li class="paginate_button page-item next disabled">
            <a class="page-link">»</a>
        </li>
    @endif
</ul>
@endif
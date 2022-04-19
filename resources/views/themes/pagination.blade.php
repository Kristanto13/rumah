@if ($paginator->hasPages())
<ul class="pagination pagination-sm m-0 float-right">
    @if ($paginator->onFirstPage())
    @else
    <li class="page-item">
        <a class="page-link paginasi" href="javascript:;" halaman="{{ $paginator->previousPageUrl() }}">&laquo;</a>
    </li>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
        <li class="page-item disabled m-1">
            <a href="javascript:;" class="page-link">...</a>
        </li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="page-item active m-1">
                    <a href="javascript:;" class="page-link">{{ $page }}</a>
                </li>
                @else
                <li class="page-item m-1">
                    <a href="javascript:;" halaman="{{ $url }}" class="page-link paginasi">{{ $page }}</a>
                </li>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
    <li class="page-item">
        <a class="page-link paginasi" href="javascript:;" halaman="{{ $paginator->nextPageUrl() }}">&raquo;</a>
    </li>
    @endif
</ul>
@endif
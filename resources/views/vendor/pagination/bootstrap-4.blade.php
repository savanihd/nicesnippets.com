@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><a class="page-item disabled" href="{{ $paginator->previousPageUrl() }}" rel="prev"><button disabled class="nextprev-btn" ><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</button></a></li>
        @else
           <li><a class="page-item" href="{{ $paginator->previousPageUrl() }}" rel="prev"><button class="nextprev-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</button></a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a class="page-item pl-2" href="{{ $paginator->nextPageUrl() }}" rel="next"><button class="nextprev-btn">Next <i class="fa fa-angle-right" aria-hidden="true"></i></button></a></li>
        @else
            <li><a class="page-item disabled" href="{{ $paginator->nextPageUrl() }}" rel="next"><button disabled class="nextprev-btn">Next <i class="fa fa-angle-right" aria-hidden="true"></i></button></a></li>
        @endif
    </ul>
@endif

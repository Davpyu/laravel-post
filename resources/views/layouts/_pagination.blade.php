@if ($paginator->hasPages())
<nav class="w-full mt-8">
    <ul class="flex items-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="invisible w-1/2"><span>&laquo; Previous</span></li>
        @else
        <li class="w-1/2 flex justify-start"><a
                class="no-underline no-underline p-2 shadow rounded text-base bg-white text-gray-800 hover:text-teal-500"
                href="{{ $paginator->previousPageUrl() }}">&laquo; Previous</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="w-1/2 flex justify-end"><a
                class="no-underline p-2 shadow rounded text-base bg-white text-gray-800 hover:text-teal-500"
                href="{{ $paginator->nextPageUrl() }}">Next
                &raquo;</a></li>
        @else
        <li class="invisible w-1/2"><span>Next &raquo;</span></li>
        @endif
    </ul>
</nav>
@endif
<nav class="flex items-center justify-between">
    <div>
        <p class="text-sm text-gray-700 leading-5">
            Showing <span class="font-medium">{{ $paginator->firstItem() }}</span> to
            <span class="font-medium">{{ $paginator->lastItem() }}</span> of
            <span class="font-medium">{{ $paginator->total() }}</span> results
        </p>
    </div>

    <div class="flex justify-center items-center">
        @if ($paginator->onFirstPage())
        <span class="rounded-md bg-gray-100 text-gray-600 px-3 py-2 mr-2">
            Previous
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" class="rounded-md bg-white text-gray-600 px-3 py-2 mr-2 hover:bg-gray-100">
            Previous
        </a>
        @endif

        @foreach ($elements as $element)
        @if (is_string($element))
        <span class="rounded-md bg-gray-100 text-gray-600 px-3 py-2 mr-2">{{ $element }}</span>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span class="rounded-md bg-white text-gray-600 px-3 py-2 mr-2 active">{{ $page }}</span>
        @else
        <a href="{{ $url }}" class="rounded-md bg-white text-gray-600 px-3 py-2 mr-2 hover:bg-gray-100">{{ $page }}</a>
        @endif
        @endforeach

        @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="rounded-md bg-white text-gray-600 px-3 py-2 hover:bg-gray-100">
            Next
        </a>
        @else
        <span class="rounded-md bg-gray-100 text-gray-600 px-3 py-2">
            Next
        </span>
        @endif
    </div>
</nav>
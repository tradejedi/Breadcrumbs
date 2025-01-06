<nav class="bg-gray-100 py-3 px-5 rounded" aria-label="breadcrumb">
    <ol class="flex space-x-2 text-sm text-gray-600">
        @foreach($breadcrumbs as $crumb)
            @if(isset($crumb['url']))
                <li class="flex items-center">
                    <a href="{{ $crumb['url'] }}" class="text-blue-500 hover:text-blue-700">
                        {{ $crumb['title'] }}
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </li>
            @else
                <li class="flex items-center text-gray-800 font-semibold">
                    {{ $crumb['title'] }}
                </li>
            @endif
        @endforeach
    </ol>
</nav>

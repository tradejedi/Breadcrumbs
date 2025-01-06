<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach($breadcrumbs as $crumb)
            @if(isset($crumb['url']))
                <li class="breadcrumb-item"><a href="{{ $crumb['url'] }}">{{ $crumb['title'] }}</a></li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $crumb['title'] }}</li>
            @endif
        @endforeach
    </ol>
</nav>

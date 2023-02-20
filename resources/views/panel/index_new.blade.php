@extends('panel.base')

@section('title', 'Home')

@section('content')
    <p class="d-block"><span class="text-white h4">My dreams</span> <a href="{{ route('entries/create') }}" class="btn btn-sm btn-primary float-end text-decoration-none"><i class="fas fa-plus"></i> Add entry</a></p>

    @php
    $latestMonth = '';
    @endphp
    @foreach($entries as $entry)
        @if($latestMonth !== $entry->created_at->format('F') || $latestMonth == '')
            @php
            $latestMonth = $entry->created_at->format('F');
            @endphp
            <h5 class="text-white position-sticky">{{ $entry->created_at->format('F Y') }}</h5>
        @endif
        <a href="{{ route('entry', $entry->id) }}" class="text-decoration-none">
            <div class="card mb-3 border-5  @if($entry->lucidity == 0) border-dark @else border-primary @endif border-start-0 border-bottom-0 border-top-0">
                <div class="card-body">
                    <p class="text-uppercase text-sm-start">{{ $entry->created_at->format('F d, Y') }} • @if($entry->lucidity == 0) Regular Dream @else Lucid Dream @endif</p>
                    <h5 class="card-title">{{ $entry->getDecryptedTitle() }}</h5>
                    <p class="card-text">@if(strlen($entry->getDecryptedContent()) > 400) {{ substr($entry->getDecryptedContent(), 0, 400) }}... @else {{ $entry->getDecryptedContent() }} @endif</p>
                    <p class="text-sm-start">
                        @if($entry->labels()->orderBy('name', 'asc')->get()->count() > 0)
                            @foreach($entry->labels()->orderBy('name', 'asc')->get() as $label)
                                <span class="badge bg-light-blue">{{ $label->name }}</span>
                            @endforeach
                        @endif
                    </p>
                </div>
            </div>
        </a>

    @endforeach
    {{ $entries->links() }}


@endsection()

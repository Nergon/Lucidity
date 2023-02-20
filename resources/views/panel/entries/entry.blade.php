@extends('panel.base')

@section('title', $entry->getDecryptedTitle())

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            {{ $entry->created_at->format('F d, Y') }} <a href="#" onclick="swalConfirmDelete()" class="float-end text-decoration-none"><i class="fas fa-trash"></i></a> <a href="{{ route('entries.edit', $entry) }}" class="float-end text-decoration-none me-2"><i class="fas fa-edit"></i></a>

        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $entry->getDecryptedTitle() }}</h4>
            <div class="card-text">
                <h6>Lucidity</h6>
                @if($entry->lucidity == 0)
                    <p>Regular Dream</p>
                @else
                    <p>Lucid - Level {{ $entry->lucidity }}</p>
                @endif

                <h6>Content</h6>
                <p>{!! nl2br(e($entry->getDecryptedContent())) !!}</p>
            </div>
            @if($entry->labels()->orderBy('name', 'asc')->get()->count() > 0)
                @foreach($entry->labels()->orderBy('name', 'asc')->get() as $label)
                    <span class="badge bg-light-blue">{{ $label->name }}</span>
                @endforeach
            @endif
        </div>
    </div>
    <form action="{{ route('entries.delete', $entry) }}" method="post" id="deleteForm">
        @csrf
    </form>
@endsection()
<script>
    function swalConfirmDelete() {
        Swal.fire({
            title: 'Do you really want to delete this entry?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,

            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        })
    }
</script>

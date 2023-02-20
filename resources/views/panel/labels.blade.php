@extends('panel.base')

@section('title', 'Labels')

@section('content')
    <div class="card mb-4">
        <div class="card-header">Create label</div>
        <div class="card-body">
            <form action="{{ route('labels.create') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="inputTitle">Label Name</label>
                    <input type="text" name="name" id="inputTitle" class="form-control @error('title') border-danger @enderror" placeholder="Label name" required autofocus>
                    @error('name')
                    <p class="text-danger text-sm-start">{{ $message }}}</p>
                    @enderror
                </div>

                <button class="btn btn-primary btn-sm" type="submit">Add label</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Your labels</div>
        <div class="card-body">
            @if($labels->count() == 0)
                <div class="alert alert-warning">You don't have any labels yet</div>
            @else
                <table class="table table">

                    <tbody>
                    @foreach($labels as $label)
                        <tr>
                            <td class="border-0">{{ $label->name }} <a class="badge bg-danger text-decoration-none float-end" href="{{ route('labels.delete', $label) }}">Delete <i class="fa fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection()

@section('script')
    @if(session('success'))
        <script>
            Swal.fire({
                'icon': 'success',
                'text': '{{ session('success') }}'
            })
        </script>
    @endif
@endsection

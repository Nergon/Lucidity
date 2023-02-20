@extends('panel.base')

@section('title', 'Create Entry')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('entries/create') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="lucidity">Lucidity</label>
                    <select class="form-control @error('title') border-danger @enderror" name="lucidity">
                        <option value="0">Regular Dream</option>
                        <option value="1">Lucid - Level 1</option>
                        <option value="2">Lucid - Level 2</option>
                        <option value="3">Lucid - Level 3</option>
                        <option value="4">Lucid - Level 4</option>
                        <option value="5">Lucid - Level 5</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputTitle">Title</label>
                    <input type="text" name="title" id="inputTitle" class="form-control @error('title') border-danger @enderror" placeholder="Title" required autofocus>
                    @error('title')
                    <p class="text-danger text-sm-start">{{ $message }}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputTitle">Labels</label>
                    <input type="text" name="labels" id="inputTitle" class="form-control @error('labels') border-danger @enderror" placeholder="Enter labels. If the label doesn't exist, it will be created" required>
                    @error('labels')
                    <p class="text-danger text-sm-start">{{ $message }}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputPassword">Content</label>
                    <textarea name="body" class="form-control @error('body') border-danger @enderror" placeholder="Your dream..." rows="10" required></textarea>
                    @error('body')
                    <p class="text-danger text-sm-start">{{ $message }}}</p>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>
@endsection()
@section('script')
    <script>
        var input = document.querySelector('input[name=labels]');

        // initialize Tagify on the above input node reference
        new Tagify(input, {
            whitelist: [
                @php
                    $string = '';
                @endphp
                @foreach(auth()->user()->labels()->select('name')->orderBy('name', 'asc')->get() as $label)
                    @php
                    $string .= '\''.e($label->name).'\','
                    @endphp
                @endforeach
                {!! substr($string, 0, -1) !!}
            ],
            dropdown: {
                classname: 'text-white'
            }
        })

        input.addEventListener('change', onChange)

        function onChange(e){
            // outputs a String
            console.log(e.target.value)
        }
    </script>
@endsection

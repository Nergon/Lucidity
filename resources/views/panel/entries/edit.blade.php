@extends('panel.base')

@section('title', 'Edit Entry ')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('entries.edit', $entry) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="lucidity">Lucidity</label>
                    <select class="form-control @error('title') border-danger @enderror" name="lucidity">
                        <option {{ ( $entry->lucidity == 0) ? 'selected' : '' }} value="0">Regular Dream</option>
                        <option {{ ( $entry->lucidity == 1) ? 'selected' : '' }} value="1">Lucid - Level 1</option>
                        <option {{ ( $entry->lucidity == 2) ? 'selected' : '' }} value="2">Lucid - Level 2</option>
                        <option {{ ( $entry->lucidity == 3) ? 'selected' : '' }} value="3">Lucid - Level 3</option>
                        <option {{ ( $entry->lucidity == 4) ? 'selected' : '' }} value="4">Lucid - Level 4</option>
                        <option {{ ( $entry->lucidity == 5) ? 'selected' : '' }} value="5">Lucid - Level 5</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputTitle">Title</label>
                    <input type="text" name="title" id="inputTitle" class="form-control @error('title') border-danger @enderror" value="{{ $entry->getDecryptedTitle() }}" placeholder="Title" required autofocus>
                    @error('title')
                    <p class="text-danger text-sm-start">{{ $message }}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputPassword">Content</label>
                    <textarea name="body" class="form-control @error('body') border-danger @enderror" placeholder="Your dream..." rows="10" required>{{ $entry->getDecryptedContent() }}</textarea>
                    @error('body')
                    <p class="text-danger text-sm-start">{{ $message }}}</p>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection()

@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.news.update', $news->id) }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <input type="hidden" name="_method" id="" value="put">
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="excerpt" id="floatingInput" value="{{ $news->excerpt }}"
                placeholder="excerpt" required>
            <label for="floatingInput">Excerpt</label>
            @error('excerpt')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="content" id="floatingPassword" value="{{ $news->content }}"
                placeholder="Password" required>
            <label for="floatingPassword">Content</label>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="file" class="form-control" name="image" accept="image/*" id="floatingInput" required>
            <label for="floatingInput">Image</label>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <img src="{{ asset('storage/' . $news->author) }}" alt="{{ $news->title }}">
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="file" class="form-control" name="author" accept="image/*" id="floatingInput" required>
            <label for="floatingInput">Author</label>
            @error('author')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="width: 120px; height: 40px;">Update</button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary"
                style="width: 120px; height: 40px;">Cancle</a>
        </div>
    </form>
@endsection

@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.feedbacks.update', $feedbacks->id) }}" method="post" enctype="multipart/form-data"
        novalidate>
        @csrf
        <input type="hidden" name="_method" id="" value="put">
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <img src="{{ asset('storage/' . $feedbacks->avatar) }}" alt="{{ $feedbacks->title }}">
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="file" class="form-control" name="avatar" accept="images/*" id="floatingInput" required>
            <label for="floatingInput">avatar</label>
            @error('avatar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="name" id="floatingInput" value="{{ $feedbacks->name }}"
                placeholder="name" required>
            <label for="floatingInput">name</label>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="position" id="floatingInput" value="{{ $feedbacks->position }}"
                placeholder="position" required>
            <label for="floatingInput">Position</label>
            @error('position')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="content" id="floatingInput" value="{{ $feedbacks->content }}"
                placeholder="content" required>
            <label for="floatingInput">content</label>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="width: 120px; height: 40px;">Update</button>
            <a href="{{ route('admin.feedbacks.index') }}" class="btn btn-secondary"
                style="width: 120px; height: 40px;">Cancle</a>
        </div>
    </form>
@endsection

@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.introduces.store') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="heading" id="floatingInput" value="{{ old('heading') }}"
                placeholder="heading" required>
            <label for="floatingInput">Heading</label>
            @error('heading')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="sub_heading" id="floatingPassword"
                value="{{ old('sub_heading') }}" placeholder="Password" required>
            <label for="floatingPassword">Sub_heading </label>
            @error('sub_heading')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="content" id="floatingPassword" value="{{ old('content') }}"
                placeholder="Content" required>
            <label for="floatingPassword">Content </label>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="file" class="form-control" name="image" accept="image/*" id="floatingInput" required>
            <label for="floatingInput">Image</label>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="file" class="form-control" name="video" accept="video/*" id="floatingInput" required>
            <label for="floatingInput">Video</label>
            @error('video')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="video_title" id="floatingPassword"
                value="{{ old('video_title') }}" placeholder="video_title" required>
            <label for="floatingPassword">video_title </label>
            @error('video_title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="width: 120px; height: 40px;">Add</button>
            <a href="{{ route('admin.introduces.index') }}" class="btn btn-secondary"
                style="width: 120px; height: 40px;">Cancle</a>
        </div>
    </form>
@endsection

@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.introduces.update', $introduce->id) }}" method="post" enctype="multipart/form-data"
        novalidate>
        @csrf
        <input type="hidden" name="_method" id="" value="put">
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="heading" id="floatingInput" placeholder="heading"
                value="{{ $introduce->heading }}" required>
            <label for="floatingInput">Heading</label>
            @error('heading')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="sub_heading" id="floatingPassword" placeholder="Password"
                value="{{ $introduce->sub_heading }}" required>
            <label for="floatingPassword">Sub_heading
            </label>
            @error('sub_heading')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="content" id="floatingPassword" placeholder="Content"
                value="{{ $introduce->content }}" required>
            <label for="floatingPassword">Content </label>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <img src="{{ asset('storage/' . $introduce->image) }}" alt="{{ $introduce->title }}">
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="file" class="form-control" name="image" accept="image/*" id="floatingInput" required>
            <label for="floatingInput">Image</label>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <video width="200" src="{{ asset('storage/' . $introduce->video) }}" alt="{{ $introduce->title }}">
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="file" class="form-control" name="video" accept="video/*" id="floatingInput" required>
            <label for="floatingInput">Video</label>
            @error('video')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="video_title" id="floatingPassword" placeholder="video_title"
                value="{{ $introduce->video_title }} " required>
            <label for="floatingPassword">video_title
            </label>
            @error('video_title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="width: 120px; height: 40px;">Update</button>
            <a href="{{ route('admin.introduces.index') }}" class="btn btn-secondary"
                style="width: 120px; height: 40px;">Cancle</a>
        </div>
    </form>
@endsection

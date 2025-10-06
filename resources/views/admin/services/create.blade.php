@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.services.store') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="file" class="form-control" name="icon" accept="image/*" id="floatingInput" required>
            <label for="floatingInput">icon</label>
            @error('icon')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="short_description" id="floatingInput"
                value="{{ old('short_description') }}" placeholder="short_description" required>
            <label for="floatingInput">short_description</label>
            @error('short_description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="content" id="floatingInput" value="{{ old('content') }}"
                placeholder="content" required>
            <label for="floatingInput">content</label>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="width: 120px; height: 40px;">Add</button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary"
                style="width: 120px; height: 40px;">Cancle</a>
        </div>
    </form>
@endsection

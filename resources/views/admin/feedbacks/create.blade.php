@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.feedbacks.store') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="file" class="form-control" name="avatar" accept="image/*" id="floatingInput" required>
            <label for="floatingInput">Avatar</label>
            @error('avatar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="name" id="floatingInput" value="{{ old('name') }}"
                placeholder="name" required>
            <label for="floatingInput">Name</label>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="position" id="floatingInput" value="{{ old('position') }}"
                placeholder="position" required>
            <label for="floatingInput">Position</label>
            @error('position')
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
            <a href="{{ route('admin.feedbacks.index') }}" class="btn btn-secondary"
                style="width: 120px; height: 40px;">Cancle</a>
        </div>
    </form>
@endsection

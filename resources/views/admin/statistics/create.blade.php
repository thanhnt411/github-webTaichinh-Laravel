@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.statistics.store') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="title" id="floatingInput" value="{{ old('title') }}"
                placeholder="title" required>
            <label for="floatingInput">Title</label>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="value" id="floatingPassword" value="{{ old('value') }}"
                placeholder="value" required>
            <label for="floatingPassword">Value</label>
            @error('value')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="width: 120px; height: 40px;">Add</button>
            <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary"
                style="width: 120px; height: 40px;">Cancle</a>
        </div>
    </form>
@endsection

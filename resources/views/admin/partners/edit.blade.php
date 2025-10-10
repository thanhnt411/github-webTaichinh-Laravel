@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.partners.update', $partners->id) }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <input type="hidden" name="_method" id="" value="put">

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <img src="{{ asset('storage/' . $partners->image) }}" alt="{{ $partners->title }}">
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="file" class="form-control" name="image" accept="image/*" id="floatingInput" required>
            <label for="floatingInput">Image</label>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="width: 120px; height: 40px;">Update</button>
            <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary"
                style="width: 120px; height: 40px;">Cancle</a>
        </div>
    </form>
@endsection

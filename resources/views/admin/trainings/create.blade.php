@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.trainings.store') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="training_course" id="floatingInput"
                value="{{ old('training_course') }}" placeholder="training_course" required>
            <label for="floatingInput">training_course</label>
            @error('training_course')
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
            <input type="text" class="form-control" name="description" id="floatingInput"
                value="{{ old('description') }}" placeholder="description" required>
            <label for="floatingInput">Description</label>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="tuition_fee" id="floatingPassword"
                value="{{ old('tuition_fee') }}" placeholder="Password" required>
            <label for="floatingPassword">tuition_fee </label>
            @error('tuition_fee')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="study_mode" id="floatingPassword"
                value="{{ old('study_mode') }}" placeholder="Password" required>
            <label for="floatingPassword">study_mode </label>
            @error('study_mode')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="class_schedule" id="floatingPassword"
                value="{{ old('class_schedule') }}" placeholder="Password" required>
            <label for="floatingPassword">Class_schedule</label>
            @error('class_schedule')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="width: 120px; height: 40px;">Add</button>
            <a href="{{ route('admin.trainings.index') }}" class="btn btn-secondary"
                style="width: 120px; height: 40px;">Cancle</a>
        </div>
    </form>
@endsection

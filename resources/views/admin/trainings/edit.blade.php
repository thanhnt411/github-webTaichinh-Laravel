@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.trainings.update', $training->id) }}" method="post" enctype="multipart/form-data"
        novalidate>
        @csrf
        <input type="hidden" name="_method" id="" value="put">
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="training_course" id="floatingInput"
                value="{{ $training->title }}" placeholder="training_course" required>
            <label for="floatingInput">Training_course</label>
            @error('training_course')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <img src="{{ asset('storage/' . $training->image) }}" alt="{{ $training->title }}">
        </div>
        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="file" class="form-control" name="image" accept="image/*" id="floatingInput" required>
            <label for="floatingInput">Image</label>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="description" id="floatingPassword"
                value="{{ $training->description }}" placeholder="Password" required>
            <label for="floatingPassword">Description</label>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="tuition_fee" id="floatingInput"
                value="{{ $training->tuition_fee }}" placeholder="tuition_fee" required>
            <label for="floatingInput">Tuition_fee</label>
            @error('tuition_fee')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="study_mode" id="floatingInput"
                value="{{ $training->study_mode }}" placeholder="study_mode" required>
            <label for="floatingInput">Study_mode</label>
            @error('study_mode')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3 mx-auto" style="width: 700px;">
            <input type="text" class="form-control" name="class_schedule" id="floatingInput"
                value="{{ $training->class_schedule }}" placeholder="class_schedule" required>
            <label for="floatingInput">class_schedule</label>
            @error('class_schedule')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="width: 120px; height: 40px;">Update</button>
            <a href="{{ route('admin.trainings.index') }}" class="btn btn-secondary"
                style="width: 120px; height: 40px;">Cancle</a>
        </div>
    </form>
@endsection

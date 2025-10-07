@extends('layouts.admin')
@section('content')
    <a href="{{ route('admin.trainings.create') }}" class="btn btn-success mb-2"><i class="fa-solid fa-plus"></i>Thêm</a>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Training_course </th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Tuition_fee</th>
                <th scope="col">Study_mode</th>
                <th scope="col">Class_schedule</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainings as $training)
                <tr>
                    <td>{{ $training->id }}</td>
                    <td>{{ $training->training_course }}</td>
                    <td><img src="{{ asset('storage/' . $training->image) }}" alt="{{ $training->title }}"></td>
                    <td>{{ $training->description }}</td>
                    <td>{{ $training->tuition_fee }}</td>
                    <td>{{ $training->study_mode }}</td>
                    <td>{{ $training->class_schedule }}</td>
                    <td><button class="btn btn-warning"><a href="{{ route('admin.trainings.edit', $training->id) }}"><i
                                    class="fa-solid fa-pencil"></i></a></button>
                    </td>
                    <td>
                        <form action="{{ route('admin.trainings.destroy', $training->id) }}" method="POST"
                            onsubmit="return confirm('Xóa bài này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.admin')
@section('content')
    <a href="{{ route('admin.feedbacks.create') }}" class="btn btn-success mb-2"><i class="fa-solid fa-plus"></i>Thêm</a>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Content</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td><img src="{{ asset('storage/' . $feedback->avatar) }}" alt="{{ $feedback->title }}"></td>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->position }}</td>
                    <td>{{ $feedback->content }}</td>
                    <td><button class="btn btn-warning"><a href="{{ route('admin.feedbacks.edit', $feedback->id) }}"><i
                                    class="fa-solid fa-pencil"></i></a></button>
                    </td>
                    <td>
                        <form action="{{ route('admin.feedbacks.destroy', $feedback->id) }}" method="POST"
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

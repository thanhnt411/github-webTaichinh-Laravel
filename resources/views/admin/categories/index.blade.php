@extends('layouts.admin')
@section('content')
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-2"><i class="fa-solid fa-plus"></i>Thêm</a>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categories)
                <tr>
                    <td>{{ $categories->id }}</td>
                    <td><img src="{{ asset('storage/' . $categories->image) }}" alt="{{ $categories->title }}"></td>
                    <td>{{ $categories->title }}</td>
                    <td><button class="btn btn-warning"><a href="{{ route('admin.categories.edit', $categories->id) }}"><i
                                    class="fa-solid fa-pencil"></i></a></button>
                    </td>
                    <td>
                        <form action="{{ route('admin.categories.destroy', $categories->id) }}" method="POST"
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

@extends('layouts.admin')
@section('content')
    <a href="{{ route('admin.services.create') }}" class="btn btn-success mb-2"><i class="fa-solid fa-plus"></i>Thêm</a>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Icon</th>
                <th scope="col">Short_description</th>
                <th scope="col">Content</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td><img src="{{ asset('storage/' . $service->icon) }}" alt="{{ $service->title }}"></td>
                    <td>{{ $service->short_description }}</td>
                    <td>{{ $service->content }}</td>
                    <td><button class="btn btn-warning"><a href="{{ route('admin.services.edit', $service->id) }}"><i
                                    class="fa-solid fa-pencil"></i></a></button>
                    </td>
                    <td>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
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

@extends('layouts.admin')
@section('content')
    <a href="{{ route('admin.introduces.create') }}" class="btn btn-success mb-2"><i class="fa-solid fa-plus"></i>Thêm</a>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Heading</th>
                <th scope="col">Sub_heading </th>
                <th scope="col">Content </th>
                <th scope="col">Image</th>
                <th scope="col">Video</th>
                <th scope="col">Video_title</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($introduces as $introduce)
                <tr>
                    <td>{{ $introduce->id }}</td>
                    <td>{{ $introduce->heading }}</td>
                    <td>{{ $introduce->sub_heading }}</td>
                    <td>{{ $introduce->content }}</td>
                    <td><img src="{{ asset('storage/' . $introduce->image) }}" alt="{{ $introduce->title }}"></td>
                    <td><video width="200" src="{{ asset('storage/' . $introduce->video) }}"
                            alt="{{ $introduce->title }}"></td>
                    <td>{{ $introduce->video_title }}</td>
                    <td><button class="btn btn-warning"><a href="{{ route('admin.introduces.edit', $introduce->id) }}"><i
                                    class="fa-solid fa-pencil"></i></a></button>
                    </td>
                    <td>
                        <form action="{{ route('admin.introduces.destroy', $introduce->id) }}" method="POST"
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

@extends('layouts.admin')
@section('content')
    <a href="{{ route('admin.news.create') }}" class="btn btn-success mb-2"><i class="fa-solid fa-plus"></i>Thêm</a>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Excerpt</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Author</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $new)
                <tr>
                    <td>{{ $new->id }}</td>
                    <td>{{ $new->excerpt }}</td>
                    <td>{{ $new->content }}</td>
                    <td><img src="{{ asset('storage/' . $new->image) }}" alt="{{ $new->title }}"></td>
                    <td><img src="{{ asset('storage/' . $new->author) }}" alt="{{ $new->title }}"></td>
                    <td><button class="btn btn-warning"><a href="{{ route('admin.news.edit', $new->id) }}"><i
                                    class="fa-solid fa-pencil"></i></a></button>
                    </td>
                    <td>
                        <form action="{{ route('admin.news.destroy', $new->id) }}" method="POST"
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

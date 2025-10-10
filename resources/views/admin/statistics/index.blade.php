@extends('layouts.admin')
@section('content')
    <a href="{{ route('admin.statistics.create') }}" class="btn btn-success mb-2"><i class="fa-solid fa-plus"></i>Thêm</a>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Value</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistics as $statistic)
                <tr>
                    <td>{{ $statistic->id }}</td>
                    <td>{{ $statistic->title }}</td>
                    <td>{{ $statistic->value }}</td>
                    <td><button class="btn btn-warning"><a href="{{ route('admin.statistics.edit', $statistic->id) }}"><i
                                    class="fa-solid fa-pencil"></i></a></button>
                    </td>
                    <td>
                        <form action="{{ route('admin.statistics.destroy', $statistic->id) }}" method="POST"
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

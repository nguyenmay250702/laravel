@extends('admins/master')

@section('title')Category @endsection('title')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Student Data</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm float-end">Add</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                @if (count($data) > 0)
                    @php
                        $dem = 0;
                    @endphp
                    @foreach ($data as $row)
                        @php
                            $dem += 1;
                        @endphp
                        <tr>
                            <td>{{ $dem }}</td>
                            <td>{{$row->ten_tloai}}</td>
                            <td>
                                <form method="post" action="{{ route('categories.destroy', $row->id) }}">
                                    @csrf {{-- tạo ra token --}}
                                    @method('DELETE') {{-- tạo ra trường ẩn trong form chứa phương thức HTTP DELETE --}}
                                    <a href="{{ route('categories.show', $row->id) }}"
                                        class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ route('categories.edit', $row->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                                </form>

                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No Data Found</td>
                    </tr>
                @endif
            </table>
            {{-- {!! $data->links() !!}  //hiển thị các nút điều hướng phân trang --}}

        </div>

    </div>

@endsection

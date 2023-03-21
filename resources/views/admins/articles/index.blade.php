@extends('admins/master')

@section('title')
    Article
@endsection('title')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Article Data</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('articles.create') }}" class="btn btn-success btn-sm float-end">Add</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Tên thể loại</th>
                    <th>Tiêu đề</th>
                    <th>Tên bài hát</th>
                    <th>Tóm tắt</th>
                    <th>Nội dung</th>
                    <th>Hình ảnh</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Action</th>
                </tr>
                @if (count($data) > 0)
                    @php
                        $dem = 0;
                    @endphp
                    @foreach ($data as $row)
                        @php
                            $dem += 1;
                            $tenTheLoai = $category::find($row->ma_tloai)->ten_tloai;
                        @endphp
                        <tr>
                            <td>{{ $dem }}</td>
                            <td>{{ $tenTheLoai }}</td>
                            <td>{{ $row->tieude }}</td>
                            <td>{{ $row->ten_bhat }}</td>
                            <td>{{ $row->tomtat }}</td>
                            <td>{{ $row->noidung }}</td>
                            <td><img src="{{ asset('images/' . $row->hinhanh) }}" width="75" /></td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->updated_at }}</td>
                            <td>
                                <form method="post" action="{{ route('articles.destroy', $row->id) }}">
                                    @csrf {{-- tạo ra token --}}
                                    @method('DELETE') {{-- tạo ra trường ẩn trong form chứa phương thức HTTP DELETE --}}
                                    <a href="{{ route('articles.show', $row->id) }}"
                                        class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ route('articles.edit', $row->id) }}"
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

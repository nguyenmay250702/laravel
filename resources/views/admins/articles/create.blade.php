@extends('admins/master')

@section('title')Add Article @endsection('title')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>

@endif

<div class="card">
    <div class="card-header">Add Article</div>
    <div class="card-body">
        <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Tên thể loại</label>
                <div class="col-sm-10">
                    <select name="ten_the_loai" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->ten_tloai}}">{{$category->ten_tloai}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Tiêu đề</label>
                <div class="col-sm-10">
                    <input type="text" name="tieu_de" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Tên bài hát</label>
                <div class="col-sm-10">
                    <input type="text" name="ten_bai_hat" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Tóm tắt</label>
                <div class="col-sm-10">
                    <input type="text" name="tom_tat" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Nội dung</label>
                <div class="col-sm-10">
                    <input type="text" name="noi_dung" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Hình ảnh</label>
                <div class="col-sm-10">
                    <input type="file" name="hinh_anh" class="form-control" />
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
</div>

@endsection('content')

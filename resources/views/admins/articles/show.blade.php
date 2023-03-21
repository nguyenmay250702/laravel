@extends('admins/master')
@section('title')
    Detail Article
@endsection('title')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Article Details</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('articles.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"> <b> Tên thể loại </b> </label>
                <div class="col-sm-10">
                    {{ $ten_the_loai }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"> <b> Tiêu đề </b> </label>
                <div class="col-sm-10">
                    {{ $article->tieude }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"> <b> Tên bài hát </b> </label>
                <div class="col-sm-10">
                    {{ $article->ten_bhat }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"> <b> Tóm tắt </b> </label>
                <div class="col-sm-10">
                    {{ $article->tomtat }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"> <b> Nội dung </b> </label>
                <div class="col-sm-10">
                    {{ $article->noidung }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"> <b> Hình ảnh </b> </label>
                <div class="col-sm-10">
                    <img src="{{ asset('images/' . $article->hinhanh) }}" width="100" class="img-thumbnail" />
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection('content')

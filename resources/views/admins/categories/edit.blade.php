@extends('admins/master')
@section('title')Edit Category @endsection('title')

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
    <div class="card-header">Edit Category</div>
    <div class="card-body">
        <form method="post" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Category Name</label>
                <div class="col-sm-10">
                    <input type="text" name="category_name" class="form-control" value="{{ $category->ten_tloai }}" />
                </div>
            </div>
            
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $category->id }}" />
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
        </form>
    </div>
</div>
@endsection('content')

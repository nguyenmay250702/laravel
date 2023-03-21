@extends('admins/master')

@section('title')Add Category @endsection('title')

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
    <div class="card-header">Add Category</div>
    <div class="card-body">
        <form method="post" action="{{ route('categories.store') }}">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">category Name</label>
                <div class="col-sm-10">
                    <input type="text" name="category_name" class="form-control" />
                </div>
            </div>
            
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
</div>

@endsection('content')

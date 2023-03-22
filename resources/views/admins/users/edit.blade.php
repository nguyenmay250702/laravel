@extends('admins/master')
@section('title')Edit User @endsection('title')

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
    <div class="card-header">Edit User</div>
    <div class="card-body">
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="user_name" class="form-control" value="{{ $user->name }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">email</label>
                <div class="col-sm-10">
                    <input type="email" name="user_email" class="form-control" value="{{ $user->email }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">password <span style="color: red">"new"</span> </label>
                <div class="col-sm-10">
                    <input type="pass" name="pass_new" class="form-control" />
                </div>
            </div>
            
            <div class="text-center">
                {{-- <input type="hidden" name="hidden_id" value="{{ $category->id }}" /> --}}
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
        </form>
    </div>
</div>
@endsection('content')

@extends('admins/master')
@section('title')Login @endsection('title')

@section('content')

@if($message = Session::get('error'))
<div class="alert alert-danger">
    {{ $message }}
</div>
@endif

<div class="card">
    <div class="card-header">Login</div>
    <div class="card-body">
        <form method="post" action="{{ route('authLogin') }}">
            @csrf
            {{-- <div class="row mb-3">
                <label class="col-sm-2 col-label-form">name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control"/>
                </div>
            </div> --}}
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control"/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">pass</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control"/>
                </div>
            </div>
            
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Login" />
            </div>
        </form>
    </div>
</div>
@endsection('content')

@extends('master')
@section('title','Create Customers')
@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
            <h5 class="alert alert-success"></h5>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Create Customer
                        <a href="{{ route('user.index') }}"
                            class="btn btn-danger float-end">BACK
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="Name:">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Ex: Le Duc Long">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Account:</label>
                            <input type="text" name="account" class="form-control" placeholder="Ex: leduclong@123">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Password:</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group mb-3 mt-3 mr-3">
                            <label for="role">Role:</label>
                            <span class="ml-10">
                                <label for="option2" class="ml-10">Admin</label>
                                <input type="radio" name="role" value="1">
                            </span>
                            <span class="ml-3">
                                <label for="option1" >Customer</label>
                                <input type="radio" name="role" value="2">
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email:</label>
                            <input type="text" name="email" class="form-control" placeholder="leduclong123@gmail.com">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Add Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

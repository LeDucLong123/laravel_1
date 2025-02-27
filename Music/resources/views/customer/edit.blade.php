@extends('master')
@section('title','Edit Customers')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
            <h5 class="alert alert-success">{{ session('status')}}</h5>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>
                        Update Customers<a href="{{ route('user.index') }}" class="btn btn-danger float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    {{-- {{ route('student.update', ['id'=>$student->id]) }} --}}
                    <form action="{{ route('user.updata', ['id'=>$user->id]) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="{{ $user->userName }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="account">Account:</label>
                            <input type="text" name="account" class="form-control" value="{{ $user->userAccount }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password:</label>
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
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
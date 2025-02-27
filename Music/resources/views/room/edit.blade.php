@extends('master')
@section('title','Edit Room')
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
                        Update Room<a href="{{ route('room.index') }}" class="btn btn-danger float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    {{-- {{ route('student.update', ['id'=>$student->id]) }} --}}
                    <form action="{{ route('room.updata', ['id'=>$room->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Name:</label>
                            <input type="text" name="name" value="{{ $room->roomName }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Capacity:</label>
                            <input type="text" name="capacity" class="form-control" value="{{ $room->roomCapacity }}">
                        </div>
                        <div class="form-group mb-3 mt-3 mr-3">
                            <label for="status">Status:</label>
                            <span class="ml-3">
                                <label for="option1" >Empty</label>
                                <input type="radio" name="status" value="2">
                            </span>
                            <span class="ml-10">
                                <label for="option2" class="ml-10">Occupied</label>
                                <input type="radio" name="status" value="1">
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
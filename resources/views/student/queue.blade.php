@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Laravel Queue</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('queue.store')}}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for=""> Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for=""> Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>

                            <a href="{{ URL::to('students') }}" class="btn btn-secondary btn-sm">Back</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

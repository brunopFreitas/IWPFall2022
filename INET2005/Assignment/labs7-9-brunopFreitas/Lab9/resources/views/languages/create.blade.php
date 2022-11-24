@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Languages') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form method="post" action="{{ route('languages.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Language Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="English">
                                @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-primary" href="{{ route('languages.index') }}"> Cancel </a>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

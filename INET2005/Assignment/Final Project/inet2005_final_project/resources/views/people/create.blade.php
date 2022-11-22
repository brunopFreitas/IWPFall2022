@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="post" action="{{ route('people.store') }}">
                            @csrf
                            <div>
                                This method is not working, what you asked in the assignment is: Show users that do not have any role
                                I can't figure out how to do subqueries using laravel
                            </div>
                            <div class="mb-3">
                                <label for="user_id" class="form-label">User:</label>
                                <select class="form-select" aria-label="Default select example" name="user_id" id="user_id">
                                    <option value="">
                                        Select a user...
                                    </option>
                                    @foreach($people as $person)
                                        <option value="{{$person->name}}">
                                            {{$person->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="languages" class="form-label">Roles:</label>
                                    @foreach($roles as $role)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$role->id}}" name="role_ids[]" id="roles">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$role->name}}
                                        </label>
                                    </div>
                                    @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-primary" href="{{ route('people.index') }}"> Cancel </a>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

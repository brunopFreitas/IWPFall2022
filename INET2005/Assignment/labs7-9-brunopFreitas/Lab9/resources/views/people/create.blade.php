@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Person') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form method="post" action="{{ route('people.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}" placeholder="First Name">
                                @error('first_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}" placeholder="Last Name">
                                @error('last_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="country_id" class="form-label">Country:</label>
                                <select class="form-select" aria-label="Default select example" name="country_id" id="country_id">
                                    <option value="">
                                        Select a country...
                                    </option>
                                    @foreach($countries as $country)
                                        <option {{ old('country_id') == $country->id ? 'selected' : ''}} value="{{$country->id}}">
                                            {{$country->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="languages" class="form-label">Languages:</label>

                                    @foreach($languages as $language)
                                    <div class="form-check">
                                        <input {{ is_array(old('language_ids')) && in_array($language->id, old('language_ids')) ? 'checked' : ''}} class="form-check-input" type="checkbox" value="{{$language->id}}" name="language_ids[]" id="languages">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$language->name}}
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

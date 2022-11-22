@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('People') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <a class="btn btn-primary" href="{{ route('people.create') }}"> Add a person </a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Languages</th>
                                    <th scope="col" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($people as $person)
                                <tr>
                                    <td>{{$person->first_name}}</td>
                                    <td>{{$person->last_name}}</td>
                                    <td>{{$person->country->name}}</td>
                                    <td>
                                        <ul>
                                        @foreach($person->languages as $language)
                                            <li>{{$language->name}}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('people.edit', $person->id)}}">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('people.destroy', $person->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

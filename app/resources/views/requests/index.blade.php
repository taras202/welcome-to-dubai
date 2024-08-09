@extends('layout')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 Custom User Registration & Login Tutorial - AllPHPTricks.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
    <h1>Requests</h1>
    <a href="{{ route('requests.create') }}">Create New Request</a>
    <ul>
        @foreach($requests as $request)
            <li>{{ $request->first_name }} {{ $request->last_name }} - <a href="{{ route('requests.show', $request) }}">View</a> - <a href="{{ route('requests.edit', $request) }}">Edit</a></li>
        @endforeach
    </ul>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
@endsection

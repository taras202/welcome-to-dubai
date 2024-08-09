@extends('layout')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 Custom User Registration & Login Tutorial - AllPHPTricks.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
    <h1>Edit Request</h1>
    <form action="{{ route('requests.update', $request) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="first_name" value="{{ $request->first_name }}" placeholder="First Name">
        <input type="text" name="last_name" value="{{ $request->last_name }}" placeholder="Last Name">
        <input type="text" name="phone" value="{{ $request->phone }}" placeholder="Phone">
        <input type="email" name="email" value="{{ $request->email }}" placeholder="Email">
        <input type="number" name="status" value="{{ $request->status }}" placeholder="Status">
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('requests.index') }}">Back to Requests</a>
@endsection

@extends('layout')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 Custom User Registration & Login Tutorial - AllPHPTricks.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
    <div class="container mt-5">
        <h1>Lead Details</h1>
        <div class="card">
            <div class="card-header">
                Lead #{{ $lead->id }}
            </div>
            <div class="card-body">
                <p><strong>Phone:</strong> {{ $lead->phone }}</p>
                <p><strong>Email:</strong> {{ $lead->email }}</p>
                <p><strong>Status:</strong> 
                    <span class="badge {{ $lead->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                        {{ $lead->status == 1 ? 'Active' : 'Inactive' }}
                    </span>
                </p>
                <div class="mt-4">
                    <a href="{{ route('leads.index') }}" class="btn btn-secondary">Back to List</a>
                    <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

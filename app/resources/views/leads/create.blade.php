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
        <h1>Create New Lead</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('leads.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="first_name" name="first_name" id="first_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="last_name" name="last_name" id="last_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="call_date" class="form-label">Call Date</label>
                        <input type="call_date" name="call_date" id="call_date" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="call_result" class="form-label">Call Result</label>
                        <input type="call_result" name="call_result" id="call_result" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="next_call_date" class="form-label">Next Call Date</label>
                        <input type="next_call_date" name="next_call_date" id="next_call_date" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('leads.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection

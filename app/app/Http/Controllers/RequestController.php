<?php

// app/Http/Controllers/RequestController.php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;

class RequestController
{
    public function index()
    {
        $requests = Request::all();
        return view('requests.index', compact('requests'));
    }

    public function create()
    {
        return view('requests.create');
    }

    public function store(HttpRequest $request)
    {
        $request->validate([
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'status' => 'required|integer'
        ]);

        Request::create($request->all());
        return redirect()->route('requests.index')->with('success', 'Request created successfully.');
    }

    public function show(Request $request)
    {
        return view('requests.show', compact('request'));
    }

    public function edit(Request $request)
    {
        return view('requests.edit', compact('request'));
    }

    public function update(HttpRequest $request, Request $requestModel)
    {
        $request->validate([
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'status' => 'required|integer'
        ]);

        $requestModel->update($request->all());
        return redirect()->route('requests.index')->with('success', 'Request updated successfully.');
    }

    public function destroy(Request $request)
    {
        $request->delete();
        return redirect()->route('requests.index')->with('success', 'Request deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use Illuminate\Http\Request;

class LeadsController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Leads::all();
        return view('leads.index', compact('leads'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leads.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            'phone' => 'required',
            'email' => 'required|email|unique:leads',
            'first_name' => 'required',
            'last_name' => 'required',
            'status' => 'required',
            'request_id' => '',
            'call_date' => 'date',
            'call_result' => 'string',
            'next_call_date' => 'date',
        ]);

        Leads::create($request->all());

        return redirect()->route('leads.index')
            ->with('success', 'Lead created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Leads $lead)
    {
        return view('leads.show', compact('lead'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leads $lead)
    {
        return view('leads.edit', compact('lead'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leads $leads)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required|email|unique:leads,email,' . $leads->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'status' => 'required',
        ]);

        $leads->update($request->all());

        return redirect()->route('leads.index')
            ->with('success', 'Lead updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leads $lead)
    {
        $lead->delete();

        return redirect()->route('leads.index')
            ->with('success', 'Lead deleted successfully.');
    }

}

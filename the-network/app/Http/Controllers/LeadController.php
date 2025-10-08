<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('source')) {
            $query->where('source', 'like', '%'.$request->source.'%');
        }

        $leads = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        $sources = ['Bayut','Property Finder','Dubizzle','Website'];
        $statuses = ['New','Contacted','Closed'];
        return view('leads.create', compact('sources','statuses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'source' => 'required|string|max:100',
            'status' => 'required|in:New,Contacted,Closed',
        ]);

        Lead::create($data);

        return redirect()->route('leads.index')->with('success', 'Lead created.');
    }

    public function show(Lead $lead)
    {
        $lead->load('activities');
        return view('leads.show', compact('lead'));
    }

    public function edit(Lead $lead)
    {
        $sources = ['Bayut','Property Finder','Dubizzle','Website'];
        $statuses = ['New','Contacted','Closed'];
        return view('leads.edit', compact('lead', 'sources', 'statuses'));
    }

    public function update(Request $request, Lead $lead)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'source' => 'required|string|max:100',
            'status' => 'required|in:New,Contacted,Closed',
        ]);

        $lead->update($data);

        return redirect()->route('leads.show', $lead)->with('success', 'Lead updated.');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Lead deleted.');
    }
}

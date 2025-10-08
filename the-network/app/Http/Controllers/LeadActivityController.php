<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadActivityController extends Controller
{
    public function store(Request $request, Lead $lead)
    {
        $data = $request->validate([
            'type' => 'required|in:Note,Viewing,Meeting',
            'description' => 'required|string',
        ]);

        $lead->activities()->create($data);

        return redirect()->back()->with('success', 'Activity added.');
    }
}

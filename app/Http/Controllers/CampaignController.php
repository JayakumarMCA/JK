<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:campaign-list', ['only' => ['index']]);
        $this->middleware('permission:campaign-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:campaign-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:campaign-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $campaigns = Campaign::latest()->paginate(10);
        return view('admin.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            's_for' => 'required|string|max:255',
        ]);

        Campaign::create($request->all());

        return redirect()->route('campaigns.index')->with('success', 'Campaign created successfully.');
    }

    public function edit(Campaign $campaign)
    {
        return view('admin.campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            's_for' => 'required|string|max:255',
        ]);

        $campaign->update($request->all());

        return redirect()->route('campaigns.index')->with('success', 'Campaign updated successfully.');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->route('campaigns.index')->with('success', 'Campaign deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Industry;
use App\Models\Product;
use App\Models\AssetType;
use App\Models\AssetUtilization;
use App\Models\Language;
use App\Models\Country;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::with(['industry', 'product', 'assetType', 'utilization', 'language', 'country'])->get();
        return view('admin.assets.index', compact('assets'));
    }

    public function create()
    {
        return view('admin.assets.create', [
            'industries' => Industry::all(),
            'products' => Product::all(),
            'assetTypes' => AssetType::all(),
            'utilizations' => AssetUtilization::all(),
            'languages' => Language::all(),
            'countries' => Country::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'industry_id' => 'required|exists:industries,id',
            'product_id' => 'required|exists:products,id',
            'asset_type_id' => 'required|exists:asset_types,id',
            'utilization_id' => 'required|exists:asset_utilizations,id',
            'language_id' => 'required|exists:languages,id',
            'country_id' => 'required|exists:countries,id',
        ]);

        $filePath = $request->file('file')->store('assets', 'public');

        Asset::create([
            'title' => $request->title,
            'file' => $filePath,
            'industry_id' => $request->industry_id,
            'product_id' => $request->product_id,
            'asset_type_id' => $request->asset_type_id,
            'utilization_id' => $request->utilization_id,
            'language_id' => $request->language_id,
            'country_id' => $request->country_id,
        ]);

        return redirect()->route('assets.index')->with('success', 'Asset created successfully.');
    }
}

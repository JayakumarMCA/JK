<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Country;
use App\Models\Language;
use App\Models\Product;
use App\Models\AssetType;
use App\Models\AssetUtilization;
use App\Models\Asset;
use App\Models\Industry;

use ZipArchive;

class HomeController extends Controller
{
    public function getEvent()
    {
        // Fetch data from tables
        $countries          =   Country::pluck('name', 'id');
        $languages          =   Language::pluck('name', 'id');
        $events             =   Event::with('country','language')->paginate(15);

        return view('admin.event', compact('countries', 'events','languages'));
    }
    public function getFetchEventsold(Request $request)
    {
        $query = Event::with('country','language')->query();

        // Apply filters
        if ($request->has('languages')) {
            $query->whereIn('language_id', $request->languages);
        }

        if ($request->has('countries')) {
            $query->whereIn('country_id', $request->countries);
        }

        if ($request->has('products')) {
            $query->whereIn('product_id', $request->products);
        }

        if ($request->has('assetTypes')) {
            $query->whereIn('asset_type_id', $request->assetTypes);
        }

        if ($request->has('assetUtilizations')) {
            $query->whereIn('utilization_id', $request->assetUtilizations);
        }

        // Apply sorting
        if ($request->has('sort_by')) {
            if ($request->sort_by == 'name_asc') {
                $query->orderBy('name', 'asc');
            } elseif ($request->sort_by == 'name_desc') {
                $query->orderBy('name', 'desc');
            } else {
                $query->orderBy('date', 'desc');
            }
        }

        // Pagination
        $events = $query->paginate(15);

        return response()->json($events);
    }
    public function getFetchEventsOLDs(Request $request)
    {
        $query = Event::with('country', 'language');
        // Apply filters
        if ($request->filled('languages')) {
            $query->whereIn('language_id', $request->languages);
        }

        if ($request->filled('countries')) {
            $query->whereIn('country_id', $request->countries);
        }
        // Apply sorting
        dd($request->languages);
        if ($request->filled('sort_by')) {
            switch ($request->sort_by) {
                case 'name_asc':
                    $query->orderBy('title', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('title', 'desc');
                    break;
                default:
                    $query->orderBy('date', 'desc');
                    break;
            }
        } else {
            // Default sorting by latest event date
            $query->orderBy('date', 'desc');
        }
        dd("hi");
        // Pagination
        $events = $query->paginate(15);
        return response()->json([
            'data' => $events->items(),
            'current_page' => $events->currentPage(),
            'last_page' => $events->lastPage(),
            'total' => $events->total(),
            'from' => $events->firstItem(),
            'to' => $events->lastItem(),
            'pagination' => (string) $events->links(), // Send pagination as HTML
        ]);
    }
    public function getFetchEvents(Request $request)
    {
        $query = Event::with('country', 'language');
        // if ($request->filled('languages') && $request->languages!='') {
        //     $query->whereIn('language_id', $request->languages);
        // }

        // if ($request->filled('countries') && $request->countries!='') {
        //     $query->whereIn('country_id', $request->countries);
        // }
        $languages = $request->filled('languages') ? (array) json_decode($request->languages, true) : [];
        $countries = $request->filled('countries') ? (array) json_decode($request->countries, true) : [];

        if (!empty($languages)) {
            $query->whereIn('language_id', $languages);
        }

        if (!empty($countries)) {
            $query->whereIn('country_id', $countries);
        }

        if ($request->filled('sort_by')) {
            switch ($request->sort_by) {
                case 'name_asc':
                    $query->orderBy('title', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('title', 'desc');
                    break;
                default:
                    $query->orderBy('date', 'desc');
                    break;
            }
        } else {
            $query->orderBy('date', 'desc');
        }
        $events = $query->paginate(15);
        $paginationHtml = $events->appends($request->query())->links()->toHtml();
        return response()->json([
            'data' => $events->items(),
            'current_page' => $events->currentPage(),
            'last_page' => $events->lastPage(),
            'total' => $events->total(),
            'from' => $events->firstItem(),
            'to' => $events->lastItem(),
            'pagination' => $paginationHtml,
        ]);
    }
    public function getAssetDetails(Request $request)
    {
        // Start query with eager loading
        $query = Asset::with(['industry', 'product', 'assetType', 'utilization', 'language', 'country']);
    
        // Apply filters
        if ($request->filled('industry')) {
            $query->whereIn('industry_id', (array) $request->industry);
        }
        if ($request->filled('product')) {
            $query->whereIn('product_id', (array) $request->product);
        }
        if ($request->filled('asset_type')) {
            $query->whereIn('asset_type_id', (array) $request->asset_type);
        }
        if ($request->filled('utilization')) {
            $query->whereIn('utilization_id', (array) $request->utilization);
        }
        if ($request->filled('language')) {
            $query->where('language_id', $request->language);
        }
        if ($request->filled('country')) {
            $query->where('country_id', $request->country);
        }
        if ($request->filled('sort_by')) {
            switch ($request->sort_by) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'date':
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }
        $assets = $query->paginate(10);
        return response()->json([
            'data' => $assets->items(),
            'pagination' => $assets->links()->toHtml(),
        ]);
    }
      
    public function getAssetLists()
    {
        $assets = Asset::with(['industry', 'product', 'assetType', 'utilization', 'language', 'country'])->get();
        $industries = Industry::all();
        $products = Product::all();
        $assetTypes = AssetType::all();
        $utilizations = AssetUtilization::all();
        $languages = Language::all();
        $countries = Country::all();
        return view('admin.page',compact('assets','industries','products','assetTypes','utilizations','languages','countries'));
    }
    public function fetchDownload(Request $request)
    {
        $query = Asset::query();

        if ($request->industry) {
            $query->whereIn('industry_id', $request->industry);
        }
        if ($request->product) {
            $query->whereIn('product_id', $request->product);
        }
        if ($request->asset_type) {
            $query->whereIn('asset_type_id', $request->asset_type);
        }
        if ($request->utilization) {
            $query->whereIn('utilization_id', $request->utilization);
        }
        if ($request->language) {
            $query->where('language_id', $request->language);
        }
        if ($request->country) {
            $query->where('country_id', $request->country);
        }

        $assets = $query->paginate(12);
        
        return response()->json([
            'data' => $assets->items(),
            'pagination' => $assets->links()->toHtml()
        ]);
    }
    public function bulkDownload(Request $request)
    {
        $assetIds = $request->asset_ids;
        if (!$assetIds || count($assetIds) === 0) {
            return response()->json(['error' => 'No assets selected'], 400);
        }
    
        $zipFileName = 'assets.zip';
        $zipPath = storage_path("app/public/$zipFileName");
    
        $assets = Asset::whereIn('id', $assetIds)->get();
        $filePaths = [];
    
        foreach ($assets as $asset) {
            $filePath = storage_path("app/public/{$asset->file}");
            if (file_exists($filePath)) {
                $filePaths[] = escapeshellarg($filePath);
            }
        }
    
        if (empty($filePaths)) {
            return response()->json(['error' => 'No valid files found'], 400);
        }
    
        // Run zip command ( `-j` removes directory structure)
        $cmd = 'zip -j ' . escapeshellarg($zipPath) . ' ' . implode(' ', $filePaths);
        shell_exec($cmd);
    
        return response()->json(['zip_url' => asset("storage/$zipFileName")]);
    }
}


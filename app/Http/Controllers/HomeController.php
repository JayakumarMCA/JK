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
class HomeController extends Controller
{
    public function getEvent()
    {
        // Fetch data from tables
        $countries          =   Country::pluck('name', 'id');
        $events             =   Event::with('country')->paginate(15);

        return view('admin.event', compact('countries', 'events'));
    }
    public function getFetchEvents(Request $request)
    {
        $query = Event::query();

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
}


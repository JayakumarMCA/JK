<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Country;
use Illuminate\Http\Request;
use Str;
use Storage;
class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:event-list', ['only' => ['index']]);
        $this->middleware('permission:event-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:event-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:event-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $events = Event::with('country')->get();
        return view('admin.events.index', compact('events'));
    }

    // Show create event form
    public function create()
    {
        $countries = Country::all();
        return view('admin.events.create', compact('countries'));
    }

    // Store a new event
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'status' => 'nullable|integer|in:0,1',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $randomName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('events', $randomName, 'public');
            $data['image'] = $imagePath;
        }
        Event::create($data);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    // Show edit form
    public function edit(Event $event)
    {
        $countries = Country::all();
        return view('admin.events.edit', compact('event', 'countries'));
    }

    // Update event
    public function update(Request $request, Event $event)
    {
        $event = Event::findOrFail($event->id);

        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'status' => 'required|integer|in:0,1',
        ]);

        $data = $request->except(['_token', '_method', 'image']);

        // Handle Image Update
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }

            // Store the new image with a random filename
            $image = $request->file('image');
            $randomName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('events', $randomName, 'public');
            $data['image'] = $imagePath;
        }

        // Update event data
        $event->update($data);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    // Delete event
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}

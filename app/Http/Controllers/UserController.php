<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['country', 'role'])->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $countries = Country::where('status',1)->get();
        $roles = Role::all();
        return view('admin.users.create', compact('countries', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|string|max:15',
            'organization' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/|confirmed',
            'role_ids' => 'required|array',
            'role_ids.*' => 'exists:roles,id',
        ], [
            'password.regex' => 'Password must have at least one uppercase, one lowercase, one number, and one special character.',
        ]);
    
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'organization' => $request->organization,
            'job_title' => $request->job_title,
            'city' => $request->city,
            'role_id' => implode(',',$request->role_ids),
            'country_id' => $request->country_id,
            'password' => Hash::make($request->password),
        ]);
    
        // Attach roles to the user
        $user->roles()->attach($request->role_ids);
    
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        $countries = Country::all();
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'countries', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'mobile' => 'required|unique:users,mobile,' . $user->id,
            'organization' => 'required',
            'job_title' => 'required',
            'city' => 'required',
            'country_id' => 'required|exists:countries,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'email' => $request->email,
            'mobile' => $request->mobile,
            'organization' => $request->organization,
            'job_title' => $request->job_title,
            'city' => $request->city,
            'country_id' => $request->country_id,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
    {
        /**
         * Display a listing of the permissions.
         */
        public function __construct()
        {
            $this->middleware('permission:permission-list', ['only' => ['index']]);
            $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
        }
        public function index()
        {
            $permissions = Permission::all();
            return view('admin.permissions.index', compact('permissions'));
        }

        /**
         * Show the form for creating a new permission.
         */
        public function create()
        {
            return view('admin.permissions.create');
        }

        /**
         * Store a newly created permission in storage.
         */
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|unique:permissions,name',
            ]);

            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
        }

        /**
         * Display the specified permission.
         */
        public function show(Permission $permission)
        {
            return view('admin.permissions.show', compact('permission'));
        }

        /**
         * Show the form for editing the specified permission.
         */
        public function edit(Permission $permission)
        {
            return view('admin.permissions.edit', compact('permission'));
        }

        /**
         * Update the specified permission in storage.
         */
        public function update(Request $request, Permission $permission)
        {
            $request->validate([
                'name' => 'required|unique:permissions,name,' . $permission->id,
            ]);

            $permission->update(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
        }

        /**
         * Remove the specified permission from storage.
         */
        public function destroy(Permission $permission)
        {
            $permission->delete();
            return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
        }
    }


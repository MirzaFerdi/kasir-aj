<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('users')->get();
        return response()->json($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|string|max:255',

        ]);

        $role = Role::create($request->all());

        return response()->json($role, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $role->load('users');
        return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'nama_role' => 'sometimes|required|string|max:255',
        ]);

        $role->update($request->all());

        return response()->json($role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(null, 204);
    }
}

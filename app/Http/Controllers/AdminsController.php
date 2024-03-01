<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function getAdmin()
    {
        return User::latest()->get();
    }

    public function getAdminById($id)
    {
        $admin = User::find($id);
        return response()->json(['admin' => $admin], 200);
    }

    public function createAdmin(Request $request)
    {
        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->is_superAdmin = $request->is_superAdmin; // Add the necessary field based on your requirements
        $admin->save();

        return response()->json([
            'message' => 'Admin created successfully',
            'admin' => $admin,
        ], 201);
    }

    public function deleteAdmin($id)
    {
        User::where('id', $id)->delete();

        return response()->json([
            'message' => 'Admin deleted successfully'
        ], 200);
    }
    public function editAdmin(Request $request, $id)
    {
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->is_superAdmin = $request->is_superAdmin;
        $admin->save();

        return response()->json(['message' => 'Admin updated successfully'], 200);
    }
}

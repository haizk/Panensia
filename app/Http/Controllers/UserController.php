<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAdmins()
    {
        $admins = User::orderBy('id', 'desc')->get();
        return response()->json($admins);
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
        $admin->phone = $request->phone;
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
        $admin->phone = $request->phone;
        $admin->is_superAdmin = $request->is_superAdmin;
        if($request->filled('password')){
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return response()->json(['message' => 'Admin data updated successfully'], 200);
    }
}

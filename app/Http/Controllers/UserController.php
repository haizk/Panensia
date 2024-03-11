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
    
    public function profileAdmin()
    {
        $admin = auth()->user();

        return response()->json([
            'user' => $admin,
        ]);
    }

    public function createAdmin(Request $request)
    {
        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);
        $admin->is_superAdmin = $request->is_superAdmin; 
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

    public function getAdminById($id)
    {
        $admin = User::find($id);

        return response()->json(['admin' => $admin]);
    }

    public function editAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'phone' => 'required|string|max:20',
            'is_superAdmin' => 'required|in:0,1',
            'password' => 'nullable|string|min:8',
        ]);

        $admin = User::find($id);

        if (!$admin) {
            return response([
                'message' => 'User not found.',
                'status' => 'error',
            ], 404);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->is_superAdmin = $request->is_superAdmin;
        
        if($request->filled('password')){
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return response()->json(['message' => 'Admin data updated successfully'], 200);
    }

    public function changePassword(Request $request, $id)
    {
        $admin = User::find($id);

        if (!$admin) {
            return response([
                'message' => 'User not found.',
                'status' => 'error',
            ], 404);
        }

        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $admin->password = Hash::make($request->password);
        $admin->save();

        return response([
            'message' => 'Password changed successfully.',
            'status' => 'success',
        ], 200);
    }
}

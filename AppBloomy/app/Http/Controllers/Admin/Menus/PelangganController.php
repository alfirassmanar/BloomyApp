<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Role;

class PelangganController extends Controller
{
    public function tampilPelanggan()
    {
        $users = User::whereDoesntHave('role', function ($query) {
            $query->whereIn('id_role', [1, 2, 5]);
        })
            ->with('role')
            ->paginate(3);

        return response()->json(['success' => true, 'users' => $users]);
    }


    public function prosesTambahPelanggan(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:tb_user',
            'email' => 'required|email|unique:tb_user',
            'nama_lengkap' => 'required',
            'id_role' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = $request->file('foto')->store('public/admin/fotoRegistrasi');
        $fotoName = basename($fotoPath);

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->id_role = $request->id_role;
        $user->foto = $fotoName;
        $user->save();

        return response()->json(['message' => 'User berhasil ditambahkan']);
    }

    public function prosesEditPelanggan($id_user)
    {
        $user = User::findOrFail($id_user);
        $roles = Role::all();
        return response()->json([
            'success' => true,
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function updatePelanggan(Request $request, $id_user)
    {
        $rules = [
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'string|min:6';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::findOrFail($id_user);
        $user->username = $request->input('username');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->email = $request->input('email');
        $user->nama_lengkap = $request->input('nama_lengkap');

        if ($request->filled('id_role')) {
            $user->id_role = $request->input('id_role');
        }

        if ($request->hasFile('foto')) {
            if ($user->foto) {
                Storage::delete('public/admin/fotoRegistrasi/' . basename($user->foto));
            }

            $fileName = $request->file('foto')->hashName();
            $request->file('foto')->storeAs('public/admin/fotoRegistrasi', $fileName);
            $user->foto = $fileName;
        }

        $user->save();
        return response()->json(['success' => true]);
    }

    public function prosesHapusPelanggan($id_user)
    {
        try {
            $user = User::findOrFail($id_user);
            $user->delete();

            return redirect()->back()->with('success', 'User berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus user: ' . $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\RoleModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KelolaPenggunaController extends Controller
{
    public function __construct()
    {
        $userRole = session()->get('userRole');
        view()->share('userRole', $userRole);
    }

    public function index()
    {
        $id_ps = Auth::user()->id_ps;

        $users = UserModel::with('roles')
            ->where('id_ps', $id_ps)
            ->orderBy('id_user', 'desc')
            ->get();

        return view('Admin.Kelola Pengguna.kelola_pengguna', compact('users'));
    }

    public function create()
    {
        $roles = RoleModel::orderBy('id_role')->get();
        return view('Admin.form.Kelola Pengguna.formAdd', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_ps' => ['required'],
            'NIP' => ['nullable', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:100', 'unique:user,username'],
            'email' => ['required', 'email', 'max:150', 'unique:user,email'],
            'password' => ['required', 'string', 'min:6'],
            'roles' => ['nullable', 'array'],
        ]);

        $user = UserModel::create([
            'id_ps' => $validated['id_ps'],
            'NIP' => $validated['NIP'] ?? null,
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);


        $roleIds = $validated['roles'] ?? [];
        $user->roles()->sync($roleIds);

        return redirect()->route('admin.kelola-pengguna.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id_user)
    {
        $user = UserModel::with('roles')->findOrFail($id_user);
        $roles = RoleModel::orderBy('id_role')->get();

        $userRoleIds = $user->roles->pluck('id_role')->toArray();

        return view('Admin.form.Kelola Pengguna.formEdit', compact('user', 'roles', 'userRoleIds'));
    }

    public function update(Request $request, $id_user)
    {
        $user = UserModel::findOrFail($id_user);

        $validated = $request->validate([
            'id_ps' => ['required'],
            'NIP' => ['nullable', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:100', 'unique:user,username'],
            'email' => ['required', 'email', 'max:150', 'unique:user,email'],
            'password' => ['required', 'string', 'min:6'],
            'roles' => ['nullable', 'array'],
        ]);

        $data = [
            'id_ps' => $validated['id_ps'],
            'NIP' => $validated['NIP'] ?? null,
            'email' => $validated['email'] ?? null,
            'username' => $validated['username'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        $roleIds = $validated['roles'] ?? [];
        $user->roles()->sync($roleIds);

        return redirect()->route('admin.kelola-pengguna.index')
            ->with('success', 'User berhasil diupdate.');
    }

    public function destroy($id_user)
    {
        $user = UserModel::findOrFail($id_user);
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.kelola-pengguna.index')
            ->with('success', 'User berhasil dihapus.');
    }
}

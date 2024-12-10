<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $allUsers = User::all();

        return view('users.list', [
            'users' => $allUsers
        ]);
    }

    public function view(int $id)
    {
        $user = User::with('orders', 'role')->findOrFail($id);
        $roles = Role::all(); // Obtener todos los roles disponibles

        return view('users.view', compact('user', 'roles'));
    }

    public function updateRole(Request $request, int $id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()
            ->route('users.view', $user->id)
            ->with('feedback.message', 'Rol actualizado correctamente.')
            ->with('feedback.type', 'success');
    }
}


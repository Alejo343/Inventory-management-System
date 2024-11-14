<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::All();
        $roles = UserType::cases();
        return view('users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = UserType::cases();
        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        try {
            User::create($request->all());
            return redirect()->route('user.index')->with('success', 'Usuario creado con exito');
        } catch (\Exception $e) {
            $errorMessage = 'A ocurrido un error al crear el usuario: ' . $e->getMessage();
            return redirect()->route('user.index')
                ->with('error', $errorMessage);
        }
    }

    public function edit(User $user)
    {
        $roles = UserType::cases();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->update($request->all());
            $Message = 'Usuario actualizado con éxito';
            return redirect()->route('user.index')->with('success', $Message);
        } catch (\Exception $e) {
            $errorMessage = 'Ha ocurrido un error al actualizar el usuario: ' . $e->getMessage();
            return redirect()->route('user.edit', $user)
                ->with('error', $errorMessage);
        }
    }

    public function updatePassword(Request $request, String $username)
    {
        $validated = $request->validate([
            'password' => 'required_with:password_confirmation|min:6',
            'password_confirmation' => 'same:password|min:6',
        ]);


        User::where('username', $username)->update([
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()
            ->route('user.index')
            ->with('success', 'Contraseña del usuario actualziada');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'Usuario eliminado exitosamente.');
        } catch (\Exception $e) {
            $errorMessage = 'A ocurrido un error al eliminar el usuario: ' . $e->getMessage();
            return redirect()->route('user.index')
                ->with('error', $errorMessage);
        }
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}

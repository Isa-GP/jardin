<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
     // Mostrar el formulario de creación
     public function create()
     {
         return view('users.create');
     }
 
     // Guardar un nuevo usuario
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users',
             'password' => 'required|min:8|confirmed',
         ]);
 
         User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => bcrypt($request->password),
         ]);
 
         return redirect()->route('users')->with('success', 'Usuario creado exitosamente');
     }
 
     // Mostrar el formulario de edición
     public function edit(User $user)
     {
         return view('users.edit', compact('user'));
     }
 
     // Actualizar un usuario existente
     public function update(Request $request, User $user)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email,' . $user->id,
         ]);
 
         $user->update([
             'name' => $request->name,
             'email' => $request->email,
             'password' => $request->password ? bcrypt($request->password) : $user->password,
         ]);
 
         return redirect()->route('users')->with('success', 'Usuario actualizado exitosamente');
     }
 
     // Eliminar un usuario
     public function destroy(User $user)
     {
         $user->delete();
 
         return redirect()->route('users')->with('success', 'Usuario eliminado exitosamente');
     }
}

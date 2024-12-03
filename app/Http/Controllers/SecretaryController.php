<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SecretaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secretaries = User::role('secretary')->get();
        return view('secretary.index', compact('secretaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('secretary.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        // Generar una contraseña temporal
        $temporaryPassword = Str::random(10);

        // Crear el usuario con la contraseña temporal encriptada
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'lastName' => $request->input('lastName'),
            'file' => $request->input('file'),
            'password' => bcrypt($temporaryPassword),
        ]);

        // Asignar el rol de paciente
        $user->assignRole('secretary');

       

        // Redirigir con la contraseña generada
        return redirect()
        ->route('secretary.index')
        ->with('status_success', "Secretaria registrada correctamente.<br><strong>Correo:</strong> {$user->email}<br><strong>Contraseña:</strong> $temporaryPassword");
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $secretary = User::findOrFail($id);
        return view('secretary.edit',compact('secretary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $secretary = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'lastName' => 'required',
        ]);
        $secretary->update($request->all());
        return redirect()->route('secretary.index')->with('status_success', "Secretaria actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $secretary = User::findOrFail($id);
        $secretary->delete();
        return redirect()->route('secretary.index')->with('status_success', "Secretaria eliminada");
    }
}

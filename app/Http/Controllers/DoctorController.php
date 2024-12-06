<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = User::role('doctor')->get();
        return view('doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $offices = Office::all();
        return view('doctor.create',compact('offices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validar los campos, haciendo que 'office_id' sea opcional
    $request->validate([
        'name' => 'required',
        'lastName' => 'required',
        'sex' =>'required',
        'id_office' => 'nullable|exists:office,id', // Opcional y debe ser un ID válido si se proporciona
        'email' => 'required|email|unique:users,email',
       
    ]);

    // Generar una contraseña temporal
    $temporaryPassword = Str::random(10);

    // Crear el usuario con la contraseña temporal encriptada
    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'lastName' => $request->input('lastName'),
        'sex' => $request->input('sex'),
        'password' => bcrypt($temporaryPassword),
    ]);

    // Asignar el rol de doctor
    $user->assignRole('doctor');

    // Si se proporciona un consultorio, vincularlo al usuario
    if ($request->filled('id_office')) {
        $user->id_office = $request->input('id_office');
        $user->save();
    }

    // Redirigir con la contraseña generada
    return redirect()
        ->route('doctor.index') // Asegúrate de que la ruta sea correcta
        ->with('status_success', "Doctor registrado correctamente.<br><strong>Correo:</strong> {$user->email}<br><strong>Contraseña:</strong> $temporaryPassword");
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
        $doctor = User::findOrFail($id);
        $offices = Office::all();
        return view('doctor.edit', compact('doctor','offices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $doctor = User::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctor.index')->with('status_success', "Doctor eliminado correctamente");
    }
}

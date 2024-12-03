<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize( 'haveaccess', 'patients.index');
        $patients = User::role('patient')->get();
        return view('patients.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email',
    //     ]);
    
    //    $user = $request->all();
    //     // Crear el usuario con la contraseña encriptada
    //      User::create($user)->assignRole('patient');
    
    //     // Retornar la contraseña generada (solo visible temporalmente)
    //     return redirect()->route('patients.index')->with('success', "Paciente registrado correctamente");


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
        $user->assignRole('patient');

       

        // Redirigir con la contraseña generada
        return redirect()
        ->route('patients.index')
        ->with('status_success', "Paciente registrado correctamente.<br><strong>Correo:</strong> {$user->email}<br><strong>Contraseña:</strong> $temporaryPassword");



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
        $patient = User::role('patient')->find($id);
        return view('patients.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'file' => 'required',
        ]);

        $patient->update($request->all());

    return redirect()->route('patients.index')->with('status_success', 'Perfil del paciente : '. $request->name . ' actualizado correctamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $userTodelete = User::where('id', $id);
        $userTodelete->delete();
        return redirect()->route('patients.index')->with('status_success','Eliminado');

    }
}

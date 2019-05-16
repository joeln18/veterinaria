<?php

namespace App\Http\Controllers\Admin;

Use App\User;
use App\Mascotas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Illuminate\Support\Facades\Auth;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mascotas.index')->with('mascotas', Mascotas::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $users = User::all();
        return view('admin.mascotas.crear', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'raza' => 'required|max:255',
            'edad' => 'required|numeric',
            'users_id' => 'required'
           ]);
           
           $mascota = Mascotas::create($validatedData);
           
           return redirect()->route('admin.mascotas.index')->with('success', 'Mascota creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascota = Mascotas::findOrFail($id);
        return view('admin.mascotas.edit', compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'raza' => 'required|max:255',
            'edad' => 'required|numeric',
            'users_id' => 'required'
        ]);

        Mascotas::whereId($id)->update([
            'nombre' => $validatedData['nombre'],
            'raza' => $validatedData['raza'],
            'edad' => $validatedData['edad'],
            'users_id' => $validatedData['users_id'],
        ]);
        return redirect()->route('admin.mascotas.index')->with('success', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mascota = Mascotas::findOrFail($id);
        $mascota->delete();
        return redirect()->route('admin.mascotas.index')->with('success', 'Usuario eliminado');
    }
}

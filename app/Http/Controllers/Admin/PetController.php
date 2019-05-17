<?php

namespace App\Http\Controllers\admin;

Use App\User;
use App\Mascotas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.mascotas.index')->with('mascotas', Mascotas::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('user.mascotas.crear', compact('users'));
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
           
           return redirect()->route('user.mascotas.index')->with('success', 'Mascota creada');
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
        $idUser = Auth::user()->id;
        $mascota = Mascotas::findOrFail($id);
        $userId = Mascotas::find($id)->users_id;
        
        if($userId == $idUser){
            return view('user.mascotas.edit', compact('mascota'));
        }
        
        return redirect()->route('user.mascotas.index')->with('warning', 'No tiene permiso para editar esta mascota');
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
        return redirect()->route('user.mascotas.index')->with('success', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idUser = Auth::user()->id;
        $mascota = Mascotas::findOrFail($id);
        $userId = Mascotas::find($id)->users_id;
        
        if($userId == $idUser){
            $mascota->delete();
            return redirect()->route('user.mascotas.index')->with('success', 'Usuario eliminado');
        }
        
        return redirect()->route('user.mascotas.index')->with('warning', 'No tiene permiso para editar esta mascota');

        
        
        
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\User;
Use App\Rol;
Use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
     public function create()
    {
        return view('admin.users.crear');
    }

    public function edit($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('warning', 'Tu no tienes permiso para editarte tu mismo');
        }
        return view('admin.users.edit')->with(['user' => User::find($id), 'rols' => Rol::all()]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edituser', compact('user'));
        //return view('admin.users.edituser')->with(['user' => User::find($id)]);
    }


    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
         'name' => 'required|max:255',
         'email' => 'required|max:255',
         'password' => 'required|min:4'
        ]);
        
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);
        
        return redirect()->route('admin.users.index')->with('success', 'Usuario creado');
        
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
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('warning', 'Tu no tienes permiso para editarte tu mismo');
        }
        if($request->rols){
            $user = User::find($id);
            $user->rols()->sync($request->rols);
        }else{
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'password' => 'required|min:4'
               ]);
            
            User::whereId($id)->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password'])
            ]);
        }
        return redirect()->route('admin.users.index')->with('success', 'Actualización exitosa');
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado');
    }
}

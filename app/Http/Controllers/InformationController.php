<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'telefono' => 'required|numeric|regex:/^09\d{8}$/',
            'facebook' => 'max:30',
            'instagram' => 'max:30',
            'twitter' => 'max:30',
            'descripcion' => 'max:240',
        ]);

        
        if (Information::where('user_id', auth()->id())->exists()) {
            return redirect()->back()->with('info', 'Ya tienes un registro existente.');
        }

        $information = new Information();
        $information->telefono = $request->telefono;
        $information->facebook = $request->facebook;
        $information->instagram = $request->instagram;
        $information->twitter = $request->twitter;
        $information->descripcion = $request->descripcion;
        $information->save();

        return redirect()->route('admin.user')->with('info', 'Información agregada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $user)
    {    
        $request->validate([
            'telefono' => 'required|numeric|regex:/^09\d{8}$/',
            'facebook' => 'max:30',
            'instagram' => 'max:30',
            'twitter' => 'max:30',
            'descripcion' => 'max:240'
        ]);

        // Actualizar los demás campos
        $user->telefono = $request->telefono;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->twitter = $request->twitter;
        $user->descripcion = $request->descripcion;

        $user->save();

        return redirect()->route('admin.user')->with('info', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

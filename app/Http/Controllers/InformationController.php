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
            'telefono' => 'required|numeric',
            'facebook' => 'required|max:30',
            'instagram' => 'required|max:30',
            'twitter' => 'required|max:30',
            'descripcion' => 'required|max:240',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        if (Information::where('user_id', auth()->id())->exists()) {
            return redirect()->back()->with('info', 'Ya tienes un registro existente.');
        }

        $imagen = $request->file('imagen');
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000);

        $imagenServidor->save(public_path('perfiles') . '/' . $nombreImagen);

        $information = new Information();
        $information->telefono = $request->telefono;
        $information->facebook = $request->facebook;
        $information->instagram = $request->instagram;
        $information->twitter = $request->twitter;
        $information->descripcion = $request->descripcion;
        $information->imagen = $nombreImagen; // Guardar ruta de la imagen
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
            'telefono' => 'required|numeric',
            'facebook' => 'required|max:30',
            'instagram' => 'required|max:30',
            'twitter' => 'required|max:30',
            'descripcion' => 'required|max:240',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);
        if ($request->hasFile('imagen')) {

            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);

            $imagenServidor->save(public_path('perfiles') . '/' . $nombreImagen);
            $imagePath = public_path('perfiles') . '/' . $user->imagen;

            // Si es necesario, elimina la imagen anterior
            if ($user->imagen && File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Actualizar la ruta de la imagen solo si se sube una nueva
            $user->imagen = $nombreImagen;
        }

        // Actualizar los demás campos
        $user->telefono = $request->telefono;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->twitter = $request->twitter;
        $user->descripcion = $request->descripcion;

        $user->save();

        return redirect()->route('admin.user')->with('info', 'Información editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

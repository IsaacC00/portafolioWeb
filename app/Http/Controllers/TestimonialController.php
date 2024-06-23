<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(4);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'testimonio' => 'required|max:255',
            'nombre_testimonio' => 'required|max:100',
            'cargo_testimonio' => 'required|max:100',
            'imagen' => 'max:1024'
            
        ]);

        // Procesar la imagen solo si se sube una
        if ($request->hasFile('imagen')) {

            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);
            $imagenServidor->save(public_path('clientes') . '/' . $nombreImagen);
            $request->merge(['imagen' => $nombreImagen]);
        }

        // dd($request);
        $new = Testimonial::create($request->all());
        return redirect()->route('admin.testimonials.edit', $new)->with('info', 'Testimonial creado con éxito');
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
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'testimonio' => 'required',
            'nombre_testimonio' => 'required',
            'cargo_testimonio' => 'required',
            'imagen' => 'image|max:1024'
        ]);


        if ($request->hasFile('imagen')) {

            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);
            
            $imagenServidor->save(public_path('clientes') . '/' . $nombreImagen);
            
            $imagePath = public_path('clientes') . '/' . $testimonial->imagen;
            
            // Si es necesario, elimina la imagen anterior
            if ($testimonial->imagen && File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $testimonial->imagen = $nombreImagen;
        }

        

        $testimonial->update($request->all());
        return redirect()->route('admin.testimonials.edit', $testimonial)->with('info', 'Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('info', 'Datos actualizados con éxito');
    }
}

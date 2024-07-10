<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class CertificateController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::orderBy('id','desc')->paginate(6);
        return view('admin.services.index',compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nombre_servicio'=>'required|max:240|unique:certificates,nombre_servicio,$service->id',
            'desc_servicio'=>'required|max:240',
            'imagen' => 'image|max:1024000'
        ]);

        $extensions = ['jpeg','png','jpg'];
        
        
        // Procesar la imagen solo si se sube una
        if ($request->hasFile('imagen')) {
            
            $imagen = $request->file('imagen');

            if (!in_array($imagen->extension(), $extensions)) {
                return back()->with('message', 'Solo se pueden subir imágenes en formato JPEG, JPG o PNG');
            }

            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            $imagenServidor->resize(62, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagenServidor->save(public_path('servicios') . '/' . $nombreImagen);
            $validatedData['imagen'] = $nombreImagen;
        }
        
        $new = Certificate::create($validatedData);
        return redirect()->route('admin.services.edit',$new)->with('info','Servicio creado con éxito');
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
    public function edit(Certificate $service)
    {
        return view('admin.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $service)
    {

        $validatedData = $request->validate([
            'nombre_servicio'=>'required|max:240|unique:certificates,nombre_servicio,$service->id',
            'desc_servicio'=>'required|max:240',
            'imagen' => 'image|max:1024000'
        ]);

        $extensions = ['jpeg','png','jpg'];
        
        if ($request->hasFile('imagen')) {

            $imagen = $request->file('imagen');

            if (!in_array($imagen->extension(), $extensions)) {
                return back()->with('message', 'Solo se pueden subir imágenes en formato JPEG, JPG o PNG');
            }

            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            
            $imagenServidor = Image::make($imagen);
            $imagenServidor->resize(62,null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagenServidor->save(public_path('servicios') . '/' . $nombreImagen);
            
            $imagePath = public_path('servicios') . '/' . $service->imagen;
            
            // Si es necesario, elimina la imagen anterior
            if ($service->imagen && File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $validatedData['imagen'] = $nombreImagen;
        }

        $service->update($validatedData);
        return redirect()->route('admin.services.edit',$service)->with('info','Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $service)
    {
        $imageName = $service->imagen;
        $imagePath = public_path('servicios/'.$imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $service->delete();
        return redirect()->route('admin.services.index')->with('info','Datos actualizados con éxito');
    }
}

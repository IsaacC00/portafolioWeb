<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Certificate;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function deleteImage($imageId)
    {
        $img = Image::findOrFail($imageId);
        // Construir la ruta completa al archivo

        // Verificar si el archivo existe y eliminarlo
        if (File::exists($img->image_path)) {
            File::delete($img->image_path);
        }
        // Eliminar registro de imagen
        $img->delete();
        return back()->with('info', 'Imagen eliminada correctamente.');
    }

    public function dltImgService($id)
    {
        $service = Certificate::findOrFail($id);
        $imageName = $service->imagen;
        
        $imagePath = public_path('servicios/' . $imageName);
        
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        
        $service->imagen = null;
        $service->save();
        return back()->with('info', 'Imagen eliminada correctamente.');

    }

    public function dltImgTestimonio($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        $imageName = $testimonial->imagen;
        
        $imagePath = public_path('clientes/'.$imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $testimonial->imagen = null;
        $testimonial->save();
        
        return back()->with('info', 'Imagen eliminada correctamente.');
    }
}

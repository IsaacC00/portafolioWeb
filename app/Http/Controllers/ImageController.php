<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
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
}

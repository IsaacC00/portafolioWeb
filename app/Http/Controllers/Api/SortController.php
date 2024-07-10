<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class SortController extends Controller
{
    public function image(Request $request){

        // poscion de las imagenes inicial
        $position = 1;
        // leemos los datos que estan viendo de la variable sort de nuestra vosta 
        $sort = $request->get('sort');
        //id de cada uno de los images
        foreach ($sort as $id) {
            $image = Image::find($id);
            $image->order = $position;
            $image->save();
            $position++;
        }

    }
}

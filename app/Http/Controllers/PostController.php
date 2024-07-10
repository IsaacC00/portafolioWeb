<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PostUpdateRequest;


class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        $post = Post::create($request->all());

        $extensions = ['jpeg','png','jpg'];
      
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                if (!in_array($image->extension(), $extensions)) {
                    return back()->with('message', 'Solo se pueden subir imágenes en formato JPEG, JPG o PNG');
                }

                // Redimenzionar la imagen
                $img = Image::make($image)->resize(null, 1240, function ($constraint) {
                    $constraint->aspectRatio();
                });

                // Guardar la imagen recortada en el almacenamiento public/storage
                $fileName = $image->hashName();
                $img->save(public_path('projects' .'/'. $fileName));

                // Crear registro en la base de datos con la nueva ruta de la imagen
                $post->images()->create(['image_path' => 'projects/' . $fileName]);
            }
        }
        
        return redirect()->route('admin.posts.edit', $post)->with('info','Proyecto creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Post $post)
    {
        $postImages = Post::with('images')->findOrFail($post->id);
        $categories = Category::pluck('name', 'id');
        return view('admin.posts.edit', compact('categories','postImages','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->update($request->all());
       
        $extensions = ['jpeg','png','jpg','gif'];
       
        if ($request->hasFile('images')) {

            
            foreach ($request->file('images') as $image) {

                if (!in_array($image->extension(), $extensions)) {
                    return back()->with('message', 'Solo se pueden subir imágenes en formato JPEG, JPG o PNG');
                }

                // Redimensionar la imagen
                $img = Image::make($image)->resize(null, 1240,
                function ($constraint) {
                    $constraint->aspectRatio();
            });

                // Guardar la imagen recortada en el almacenamiento local
                $fileName = $image->hashName();
                $img->save(public_path('projects' .'/'. $fileName));


                // Crear registro en la base de datos con la nueva ruta de la imagen
                $post->images()->create(['image_path' => 'projects/' . $fileName]);
            }
        }
        
        return redirect()->route('admin.posts.edit', $post)->with('info','Proyecto editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        if($post->images->isNotEmpty()){
            foreach ($post->images as $image) {
                
                $imagePath = $image->image_path;
                
                if ( File::exists($imagePath) ){
                    File::delete($imagePath);
                }

                $image->delete();

            }
        }

        $post->delete();
        return redirect()->route('admin.posts.index')->with('info', 'Lista actualizada con éxito');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequst;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.projects.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create',compact('categories'));
    }

    public function edit(Post $post)
    {
        return view('admin.projects.edit',compact('post'));
    }

    public function store(Request $request)
{   
    
    $rules = [
        'titulo' => 'required',
        'status' => 'required|in:1,2',
        'category_id' => 'required',
        
    ];

    if ($request->status == 2) {
        $rules = array_merge($rules, [
            'extract' => 'required',
            'body' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    }

    $validatedData = $request->validate($rules);

    $post = new Post();

    $post->name = $validatedData['titulo'];
    $post->status = $validatedData['status'];
    $post->user_id = auth()->user()->id;

    if ($post->status == 2) {
        $post->category_id = $validatedData['category_id'];
        $post->extract = $validatedData['extract'];
        $post->body = $validatedData['body'];
    }

    $post->save();

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('public');
            $fileName = basename($path);
            $post->images()->create(['image_path' => 'public/'.$fileName]);
        }
    }

    return redirect()->route('admin.projects.edit', $post)
                     ->with('info', 'Proyecto creado con éxito');
}

public function destroy(Post $post)
{
    $post->delete();
    return redirect()->route('admin.projects.index')->with('info','Datos actualizados con exito');
}

}

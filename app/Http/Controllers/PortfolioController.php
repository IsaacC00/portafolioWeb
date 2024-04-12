<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
    public function edit(Post $post)
    {
        dd($post->id);
        return view('admin.projects.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        dd($post->id);
        $post->delete();
        return redirect()->route('admin.projects.index')->with('info', 'Datos actualizados con exito');
    }
}

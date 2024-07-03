<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::all();
        return view('admin.categories.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar informacion 
        $request->validate([
                'name'=>'required',
                'slug'=>'required|unique:categories'
            ]);

        $new=Category::create($request->all());
        return redirect()->route('admin.categories.edit', $new)->with('info','Categoria creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
         //validar informacion 
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:categories,slug,$category->id"
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.edit',$category)->with('info','Datos actualizados con exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $defaultCategoryId = 1;

        if ($category->id == $defaultCategoryId) {
            return back()->with('mensaje','No se puede eliminar esa categoría');
        }

        // Reasignar posts a la categoría por defecto
        Post::where('category_id', $category->id)->update(['category_id' => $defaultCategoryId]);

        $category->delete();
        return redirect()->route('admin.categories.index')->with('info','Datos actualizados con exito');
    }
}

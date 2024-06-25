<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Information;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $information = Information::first();
        $posts = Post::where('status', 2)->latest('id')->paginate(6);
        $testimonios = Testimonial::latest('id')->get();
        $services = Certificate::orderBy('nombre_servicio')->get();
        $last= Post::where('status', 2)->orderBy('id', 'desc')->first();
       
        if ($last) {
            // Cargar las dos primeras imágenes asociadas
            $images = $last->images()->take(4)->get();
        }else{
            $images = collect();
        }
        return view('home.index', compact( 
            'information', 
            'posts',
            'testimonios',
            'services',
            'last',
            'images' ));
        // 
    }

    public function index()
    {

        $posts = Post::where('status', 2)->latest('id')->get();
        return view('home.post', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('images')->findOrFail($id);

        $this->authorize('published', $post);

        $images = $post->images()->get();
        return view('home.show', compact('post', 'images'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
            ->where('status', 2)
            ->latest('id')->get();

        return view('home.category', compact('posts', 'category'));
    }
}

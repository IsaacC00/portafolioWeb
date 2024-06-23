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
        $certificados = Certificate::orderBy('fecha_certificado')->get();
        return view('home.index', [
            'information'=>$information,
            'posts'=>$posts,
            'testimonios'=>$testimonios,
            'certificados'=>$certificados,
        ]);
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

        $this->authorize('published',$post);
        
        $images= $post->images()->get();
        return view('home.show' , compact('post','images'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
        ->where('status',2)
        ->latest('id')->get();

        return view('home.category',compact('posts','category'));

    }
}

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
        $testimonios = Testimonial::all();
        $certificados = Certificate::all();
        return view('home.index', [
            'information'=>$information,
            'posts'=>$posts,
            'testimonios'=>$testimonios,
            'certificados'=>$certificados,
        ]);

    }

    public function index()
    {
        
        $posts = Post::where('status', 2)->latest('id')->paginate(9);
        return view('home.post', compact('posts'));
    }

    public function show($id)
    {   
        $post = Post::with('images')->findOrFail($id);

        $this->authorize('published',$post);
        
        $similar =Post::where('category_id',$post->category_id)
                        ->where('status',2)
                        ->where('id', '!=', $post->id)
                        ->latest('id')
                        ->take(3)
                        ->get();
        
        $images= $post->images()->paginate(3);
        return view('home.show' , compact('post','images','similar'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
        ->where('status',2)
        ->latest('id')
        ->paginate(3);

        return view('home.category',compact('posts','category'));

    }
}

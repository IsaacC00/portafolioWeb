<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials=Testimonial::all();
        return view('admin.testimonials.index',compact('testimonials')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'testimonio'=>'required',
            'nombre_testimonio'=>'required',
            'cargo_testimonio'=>'required',

        ]);

        // dd($request);
        $new = Testimonial::create($request->all());
        return redirect()->route('admin.testimonials.edit', $new)->with('info','Testimonial creado con exito');
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
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'testimonio'=>'required',
            'nombre_testimonio'=>'required',
            'cargo_testimonio'=>'required',
        ]);

        $testimonial->update($request->all());

        return redirect()->route('admin.testimonials.edit',$testimonial)->with('info','Datos actualizados con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('info','Datos actualizados con exito');
    }
}

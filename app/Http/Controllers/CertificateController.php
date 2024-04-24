<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::paginate(4);
        return view('admin.certificates.index',compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'desc_certificado'=>'required',
            'inst_certificado'=>'required',
            'tipo_certificado'=>'required',
            'fecha_certificado'=>'required',
        ]);
        // dd($request);
        $new = Certificate::create($request->all());
        return redirect()->route('admin.certificates.edit',$new)->with('info','Certificado creado con éxito');
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
    public function edit(Certificate $certificate)
    {

        return view('admin.certificates.edit',compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'desc_certificado'=>'required',
            'inst_certificado'=>'required',
            'tipo_certificado'=>'required',
            'fecha_certificado'=>'required',
        ]);
        // dd($request);
        $certificate->update($request->all());
        return redirect()->route('admin.certificates.edit',$certificate)->with('info','Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('admin.certificates.index')->with('info','Datos actualizados con éxito');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprobanteItem = DB::table('ComprobanteFacturacionItem')->get();
        return view('index',compact('comprobanteItem'));
    }

    public function detalle(){
        return "detalle";
    }

    public function descargarComprobante(){
        $comprobanteItem = DB::table('ComprobanteFacturacionItem')->get();
        $pdf = PDF::loadView('pdf_view', $comprobanteItem);
        return $pdf->download('pdf_file.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comprobante  $comprobante
     * @return \Illuminate\Http\Response
     */
    public function show(Comprobante $comprobante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comprobante  $comprobante
     * @return \Illuminate\Http\Response
     */
    public function edit(Comprobante $comprobante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comprobante  $comprobante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comprobante $comprobante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comprobante  $comprobante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comprobante $comprobante)
    {
        //
    }
}

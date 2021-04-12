<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ComprobanteController extends Controller
{
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
        $pdf = PDF::loadView('pdf/comprobante', $comprobanteItem);
        return $pdf->download('name.pdf');
    }

}

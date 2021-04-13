<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use QrCode;

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
        QrCode::generate('Make me into a QrCode!', '../public/qrcode/qrcode.svg');
        $image = base64_encode(file_get_contents(public_path('/qrcode/qrcode.svg')));

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 
                                'isRemoteEnabled' => true,
                                'chroot' => public_path('qrcode/')])
                                /*->setOptions(['tempDir'=>'public_path()'])*/
                                ->loadView('pdf/comprobante',['image' => $image]);

        return $pdf->download('name.pdf');
    }

}

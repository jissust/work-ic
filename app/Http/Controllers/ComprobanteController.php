<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use QrCode;

class ComprobanteController extends Controller
{
    public function index(){
      $comprobanteItem = $this->comprobantesConDetalle();
      return view('index',compact('comprobanteItem'));
    }

    public function comprobantesConDetalle(){
      $comprobanteItem = DB::table('Comprobante')->get();
      if($comprobanteItem){
        foreach ($comprobanteItem as $key => $value) {
          $items = DB::table('ComprobanteFacturacionItem')->where('codigoInternoComprobanteFacturacion',$value->codigoInternoComprobante)->get();
          $value->items = $items;
        }
      }
      return $comprobanteItem;
    }

    public function descargarComprobante(){
      $this->generarQr();
      $image = base64_encode(file_get_contents(public_path('/qrcode/qrcode.svg')));
      $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 
                              'isRemoteEnabled' => true,
                              'chroot' => public_path('qrcode/')])
                              ->loadView('pdf/comprobante',['image' => $image]);

      return $pdf->download('name.pdf');
    }

    public function generarQr(){
      $datosBase64 = base64_encode('{"ver":1,"fecha":"2020-10-13","cuit":30000000007,"ptoVta":10,"tipoCmp":1,"nroCmp":94,"importe":12100,"moneda":"DOL","ctz":65,"tipoDocRec":80,"nroDocRec":20000000001,"tipoCodAut":"E","codAut":70417054367476}');
      QrCode::generate('https://www.afip.gob.ar/fe/qr/?p='.$datosBase64, '../public/qrcode/qrcode.svg');
    }

}

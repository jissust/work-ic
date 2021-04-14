<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Interforming</title>
  </head>
  <body>
    
    <section>
      <div class="container">
        <div class="table-responsive">
          <table class="table table-hover table-responsive table-striped">
            <thead class="table-dark">
              <tr>
                <th scope="col">Item</th>
                <th scope="col">Codigo Interno Empresa</th>
                <th scope="col">codigo Tipo Comprobante</th>
                <th scope="col">Centro Facturación</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach( $comprobanteItem as $k => $v )  
              <tr>
                <th scope="row">{{ $v->codigoInternoComprobante }}</th>
                <td>{{ $v->codigoInternoEmpresa }}</td>
                <td>{{ $v->codigoTipoComprobante }}</td>
                <td>{{ $v->centroFacturacion }}</td>
                <td class="d-flex">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetalle{{$k}}">
                    Detalle
                  </button> 
                  <a class="btn btn-danger ms-2" href="/descargar">
                    Pdf
                  </a>
                </td>

                <div class="modal fade" id="modalDetalle{{$k}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        #{{ $v->codigoInternoComprobante }}
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      
                      <div class="container">
                        <div class="row py-2">
                          <div class="col-6">
                            <span class="fw-bold">Codigo interno empresa</span>
                          </div> 
                          <div class="col-6">
                            {{ $v->codigoInternoEmpresa }}
                          </div> 
                        </div>
                        <div class="row py-2">
                          <div class="col-6">
                            <span class="fw-bold">Codigo tipo comprobante</span>
                          </div> 
                          <div class="col-6">
                            {{ $v->codigoTipoComprobante }}
                          </div> 
                        </div>
                        <div class="row py-2">
                          <div class="col-6">
                            <span class="fw-bold">Centro facturación</span>
                          </div> 
                          <div class="col-6">
                            {{ $v->centroFacturacion }}
                          </div> 
                        </div>
                      </div>
                      <div class="container">
                        <div class="row">
                            <h3>Items</h1>
                        </div>
                      </div>  
                      @foreach($v->items as $key => $value)
                        <div class="container">
                          <div class="row py-2">
                            <div class="col-6">
                            <span class="fw-bold">
                              #
                            </span>
                            </div> 
                            <div class="col-6">
                              {{ $value->codigoItemComprobanteFacturacion }} 
                            </div>
                          </div>
                          <div class="row py-2">
                            <div class="col-6">
                              <span class="fw-bold">
                                Codigo interno material
                              </span>
                            </div> 
                            <div class="col-6">
                              {{ $value->codigoInternoMaterial }}
                            </div>
                          </div>
                          <div class="row py-2">
                            <div class="col-6">
                              <span class="fw-bold">
                                Cantidad
                              </span>
                            </div> 
                            <div class="col-6">
                              {{ $value->cantidad }}
                            </div>
                          </div>
                        </div>
                      @endforeach  
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

  </body>
</html>
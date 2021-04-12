<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <section>
      <div class="container">
        <div class="table-responsive">
          <table class="table 
                        table-hover 
                        table-responsive
                        table-striped">
            <thead class="table-dark">
              <tr>
                <th scope="col">Item</th>
                <th scope="col">Comprobante</th>
                <th scope="col">Interno</th>
                <th scope="col">cantidad</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach( $comprobanteItem as $k => $v )  
              <tr>
                <th scope="row">{{ $v->codigoItemComprobanteFacturacion }}</th>
                <td>{{ $v->codigoInternoComprobanteFacturacion }}</td>
                <td>{{ $v->codigoInternoMaterial }}</td>
                <td>{{ $v->cantidad }}</td>
                <td>
                  <form action="/detalle" method="POST">
                    @csrf
                    <button class="btn btn-info">
                      Ver Detalle
                    </button>
                  </form>
                  <a class="btn btn-danger" href="/descargar">
                    Pdf
                  </a>
                </td>
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
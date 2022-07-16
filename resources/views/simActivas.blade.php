<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SimCards-Activas</title>
    <link rel="stylesheet" href="{{ URL('css/reportes.css') }}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ URL('image/logo.png') }}" style="width: 25%;height: 25%;">
      </div>
      <h1>Reporte de SimCards</h1>
      <div id="company" class="clearfix">
        <div>AUXICAM</div>
        <div>Guarambare<br /></div>
        <div><a href="mailto:auxicamapp@gmail.com">auxicamapp@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>Proyecto</span> Sistema Auxicam</div>
        <div><span>Direccion</span> San Francisco de Asís N° 464</div>
        <div><span>Fecha</span> {{$date}}</div>
      </div>
    </header>
    <main>
     <div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Numero SIMCARD</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($simcards as $sim)
          <tr>
            <td class="desc">{{$sim->simcardid}}</td>
            <td class="desc">{{$sim->numero}}</td>
            <td class="desc">{{$sim->estado}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
     </div>
      <div id="notices">
        <div>DETALLE:</div>
        <div class="notice">Reporte de SimCards.</div>
      </div>
    </main>
    <footer>
      AUXICAM-PARAGUAY-2022
    </footer>
  </body>
</html>
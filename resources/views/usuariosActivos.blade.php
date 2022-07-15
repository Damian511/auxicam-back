<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Usuarios-Activos</title>
    <link rel="stylesheet" href="{{ URL('css/reportes.css') }}" media="all">
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ URL('image/logo.png') }}" style="width: 25%;height: 25%;">
      </div>
      <h1>Reporte de Usuarios Activos</h1>
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
            <th>Usuarios</th>
            <th>Email</th>
            <th>Número de Contacto</th>
            <th>Cantidad de Dispositivos</th>
            <th>Fecha de Ingreso</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
          <tr>
            <td class="desc">{{$user->id}}</td>
            <td class="desc">{{$user->name}}</td>
            <td class="desc">{{$user->email}}</td>
            <td class="desc">{{$user->telefono}}</td>
            <td class="desc">{{$user->cantidad}}</td>
            <td class="desc">{{$user->fecha}}</td>
            <td class="desc">{{$user->estado}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
     </div>
      <div id="notices">
        <div>TIPO:</div>
        <div class="notice">Reporte de Usuarios Activos</div>
      </div>
    </main>
    <footer>
      AUXICAM-PARAGUAY-2022
    </footer>
  </body>
</html>
<!-- <style>
  .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }
  
  a {
    color: #5D6975;
    text-decoration: underline;
  }
  
  body {
    position: relative;
    width: 19cm;  
    height: 29.7cm; 
    margin: 0 auto; 
    color: #001028;
    background: #FFFFFF; 
    font-family: Arial, sans-serif; 
    font-size: 12px; 
    font-family: Arial;
  }
  
  header {
    padding: 10px 0;
    margin-bottom: 30px;
  }
  
  #logo {
    text-align: center;
    margin-bottom: 10px;
  }
  
  #logo img {
    width: 90px;
  }
  
  h1 {
    border-top: 1px solid  #5D6975;
    border-bottom: 1px solid  #5D6975;
    color: #5D6975;
    font-size: 2.4em;
    line-height: 1.4em;
    font-weight: normal;
    text-align: center;
    margin: 0 0 20px 0;
    background: url(dimension.png);
  }
  
  #project {
    float: left;
  }
  
  #project span {
    color: #5D6975;
    text-align: right;
    width: 52px;
    margin-right: 10px;
    display: inline-block;
    font-size: 0.8em;
  }
  
  #company {
    float: right;
    text-align: right;
  }
  
  #project div,
  #company div {
    white-space: nowrap;        
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
    margin-left: -1px;
  }
  
  table tr:nth-child(2n-1) td {
    background: #F5F5F5;
  }
  
  table th,
  table td {
    text-align: center;
  }
  
  table th {
    padding: 5px 20px;
    color: #5D6975;
    border-bottom: 1px solid #C1CED9;
    white-space: nowrap;        
    font-weight: normal;
  }
  
  table .service,
  table .desc {
    text-align: center;
  }
  
  table td {
    padding: 15px;
    text-align: right;
  }
  
  table td.service,
  table td.desc {
    vertical-align: top;
  }
  
  table td.unit,
  table td.qty,
  table td.total {
    font-size: 1.2em;
  }
  
  table td.grand {
    border-top: 1px solid #5D6975;;
  }
  
  #notices .notice {
    color: #5D6975;
    font-size: 1.2em;
  }
  
  footer {
    color: #5D6975;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #C1CED9;
    padding: 8px 0;
    text-align: center;
  }
</style> -->
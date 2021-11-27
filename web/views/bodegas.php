<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inventario</title>
  <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/stylesheets/main.css" />
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Menu</span><span
            class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a
          class="navbar-brand" href="#">UTHCSS</a></div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="/views/index.twig">Inicio</a></li>
          <li  class="active"><a href="/views/articulos.php">Articulos</a></li>
          <li><a href="/views/bodegas.php">Bodegas</a></li>
          <li><a href="/views/kardex.php">Kardex</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <form>
    <div class="form-group">
      <label for="nombreBodega">Nombre</label>
      <input type="text" class="form-control" id="nombreBodega" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="descripcionBodega">Descripcion</label>
      <input type="text" class="form-control" id="descripcionBodega" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</body>

</html>
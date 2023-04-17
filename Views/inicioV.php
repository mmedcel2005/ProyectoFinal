<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOMBRE | Inicio</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../style/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    body {
      background-color: #1c1c1c;
    }

    .bg-custom {
      background-color: #121212;
    }

    .bg-custom-sec {
      background-color: #2b2b2b ;
    }
  </style>
</head>

<body>
  <!--------------- NAV  --------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
    <a class="navbar-brand" href="#">Navbar w/ text</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Mistery Boxes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Oro gratis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tienda</a>
        </li>
      </ul>
    </div>
  </nav>

  <!--------------- NAV BOXES  --------------->
  <article id>
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-16 ">
          <div class="card mb-4 bg-custom-sec">
            <div class="card-body text-center bg-custom-sec">
              <div class="d-flex justify-content-between">
                <button class="btn btn-primary">Botón 1</button>
                <button class="btn btn-secondary">Botón 2</button>
                <button class="btn btn-success">Botón 3</button>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </article>


  <!--------------- FOOTER  --------------->

  <footer class="bg-custom text-center text-white" id="contact_footer">
    <br>
    <div class="d-flex justify-content-around">
      <div>
        <h3>Dirección</h3>
        <p>
          Calle Cordoba 8<br>
          Madrid<br>
          España
        </p>
      </div>
      <div>
        <h3>Gmail</h3>
        <p>
          contacto@ejemplo.com<br>
          officina@sampledomain.com
        </p>
      </div>
      <div>
        <h3>Teléfono</h3>
        <p>
          897 87 78 23<br>
          654 98 65 09<br>
          789 09 39 85
        </p>
      </div>
    </div>

    <div class="text-center p-3">
      © 2022 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">Alejandro Ceballos & Manuel Medina</a>
    </div>
  </footer>
</body>

</html>
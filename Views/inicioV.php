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
      background-color: #2b2b2b;
    }

    .imagen-superpuesta {
  top: 0;
  right: 0;
  max-width: 50px; /* Ajusta el ancho máximo de la imagen superpuesta */
  width: 100%; /* Asegura que la imagen ocupe todo el ancho del contenedor */
  height: auto; /* Ajusta la altura automáticamente */
} 
.text-token{
  color: #efb810;
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
  <article id="nav-boxes">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-16 ">
          <div class="card mb-4 bg-custom-sec">
            <div class="card-body text-center bg-custom-sec ">
              <div class="d-flex justify-content-between ">
                <button class="btn bg-custom flex-fill mx-2 pt-2 pb-2 text-secondary rounded-1">Popular</button>
                <button class="btn bg-custom flex-fill mx-2 pt-2 pb-2 text-secondary rounded-1">Tecnología</button>
                <button class="btn bg-custom flex-fill mx-2 pt-2 pb-2 text-secondary rounded-1">Ropa</button>
                <button class="btn bg-custom flex-fill mx-2 pt-2 pb-2 text-secondary rounded-1">Figuras</button>
                <button class="btn bg-custom flex-fill mx-2 pt-2 pb-2 text-secondary rounded-1">Cine</button>
                <button class="btn bg-custom flex-fill mx-2 pt-2 pb-2 text-secondary rounded-1">Nuevo</button>
                <button class="btn bg-custom flex-fill mx-2 pt-2 pb-2 text-secondary rounded-1">Ofertas</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>

  <article>
  <div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="card position-relative text-center bg-custom-sec" >
        <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
        <img src="imagen-superpuesta.png" class="position-absolute imagen-superpuesta" alt="Imagen superpuesta">
        <div class="card-body">
          <p class="card-text text-secondary"><b>Descripción de la tarjeta 1 </b> </p>
          <h5 class="card-text text-token"> <b> 1.234  </b></h5>
          <a href="#" class="btn btn-primary color-tokens">Botón de la tarjeta 1</a>
        </div>
      </div>
    </div>
    <!-- Tarjetas 2 y 3 -->
  </div>
</div>
</article>

  <!--------------- FOOTER  --------------->

  <footer class="bg-custom text-center text-white" id="contact_footer">
    <br>
    <div class="d-flex justify-content-around">
      <div>
        <h3>Contacto</h3>
        <p>
          <i class="bi bi-facebook"></i> Facebok<br>
          <i class="bi bi-instagram"></i> Instagram<br>
          <i class="bi bi-twitter"></i> Twitter<br>
          <i class="bi bi-envelope"></i> support@ejemplo.com<br>
          <i class="bi bi-telephone-fill"></i> +34 45 67 23 45<br>
        </p>
      </div>
      <div>
        <h3>Información</h3>
        <p>
          <a href=""> Politicas y preguntas</a><br>
          <a href=""> Politicas y preguntas</a><br>
          <a href=""> Politicas y preguntas</a><br>
          <a href=""> Politicas y preguntas</a><br>
          <a href=""> Politicas y preguntas</a>

        </p>
      </div>
      <div>
        <h3>Formas de pago</h3>
        <p>
          897 87 78 23<br>
          654 98 65 09<br>
          789 09 39 85
        </p>
      </div>
    </div>

    <div class="text-center p-3">
      © 2022 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">Manuel Medina</a>
    </div>
  </footer>
</body>

</html>
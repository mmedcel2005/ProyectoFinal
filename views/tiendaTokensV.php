<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOMBRE | Inicio</title>
  <link rel="icon" href="../src/img/logo-Mini.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
      h1,
    h2,
    h3,
    h4,
    h5 {
      font-family: 'Bebas Neue', sans-serif;
    }
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
      max-width: 100px;
      /* Ajusta el ancho máximo de la imagen superpuesta */
      width: 100%;
      /* Asegura que la imagen ocupe todo el ancho del contenedor */
      height: auto;
      /* Ajusta la altura automáticamente */
    }

    .text-token {
      color: #efb810;
      font-weight: bold;
    }

    .btn-amarillo {
      background-color: #efb810;
      font-weight: bold;
    }

    tr:last-child td {
      border-bottom: none;
    }

    .btn-amarillo:hover {
      background-color: #efb810;
      color: white;
    }

    .notification {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: green;
      color: white;
      padding: 10px;
      border-radius: 5px;
      display: none;
    }

    .notification.show {
      display: block;
    }
  </style>
</head>

<body>
<header>
    <!--------------- NAV  --------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
      <div class="container-fluid">
        <a class="nav-link" href="../index.php">
          <img src="..\src\img\logoXL.png" alt="" style="height: 40px" />
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="../index.php"><b>Mistery Boxes</b></a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="../controller/tiendaTokensC.php"><b>Tienda</b></a>
            </li>
            <li class="nav-item"></li>
          </ul>

          <?php
          print('<div class="d-flex flex-column mx-lg-5">');
          print('<a class="nav-link" href="../controller/usuarioC.php">');
          print('<div class="d-flex align-items-center">');
          print('<img src="' . $_SESSION['imagen'] . '" alt="Imagen de usuario" class="rounded-circle usuario-imagen" style="max-width: 40px;" />');
          print('<span class="usuario-nombre text-white">' . $_SESSION['nombre'] . '</span>');
          print('</div>');
          print('</a>');

          print('<a class="nav-link mt-2" href="../controller/tiendaTokensC.php">');
          print('<div class="d-flex align-items-center">');
          print('<img src="../src/img/token.png" alt="Imagen de token" class="rounded-circle usuario-imagen" style="max-width: 40px;" />');
          print('<p class="text-token"><b>' . $_SESSION['cantTokens'] . '</b></p>');
          print('</div>');
          print('</a>');

          print('</div>');


          ?>
          <div id="google_translate_element" class="google"></div>
        </div>
      </div>
    </nav>
  </header>



  <main>

    <article>
      <div class="container">
        <div class="row mt-3">

          <?php
          foreach ($packTokens as $tokens) {
            print('<div class="col-sm-4 mb-3">');
            print(' <div class="card position-relative text-center bg-custom-sec">');
            print('  <img src="' . $tokens["imagen"] . '" class="card-img-top" alt="Imagen de ' . $tokens["cantidadToken"] . ' tokens">');
            if ($tokens["enOferta"] == "S") {
              print('<img src="../src/img/oferta.png" class="position-absolute imagen-superpuesta" alt="Caja Nueva">');
            }
            print('  <div class="card-body">');
            print('    <p class="card-text text-muted"><b>' . $tokens["precio"] . ' €</b></p>');
            print('    <h4 class="card-text text-token">' . $tokens["cantidadToken"] . '</h4>');
            print('     <input type="hidden" class="idPackToken" name="id" value="' . $tokens["idPackToken"] . '">');
            print('     <button type="submit" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-amarillo color-tokens col-sm-11">Comprar</button>');
            print('   </div>');
            print(' </div>');
            print('</div>');
          }
          ?>

        </div>
      </div>
    </article>

    <article>
      <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Selecciona método de pago:</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Seleccionar</th>
                    <th scope="col">Nombre de la tarjeta</th>
                    <th scope="col">Números de la tarjeta</th>
                    <th scope="col">Titular de la tarjeta</th>
                    <th scope="col">Fecha de caducidad</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input class="form-check-input" type="checkbox" name="metodoPago" id="metodoPago1" onchange="handleCheckboxChange(1)"></td>
                    <td>Tarjeta 1</td>
                    <td>**** **** **** 1234</td>
                    <td>John Doe</td>
                    <td>05/25</td>
                  </tr>
                  <tr>
                    <td><input class="form-check-input" type="checkbox" name="metodoPago" id="metodoPago2" onchange="handleCheckboxChange(2)"></td>
                    <td>Tarjeta 2</td>
                    <td>**** **** **** 5678</td>
                    <td>Jane Smith</td>
                    <td>10/23</td>
                  </tr>
                  <tr>
                    <td><input class="form-check-input" type="checkbox" name="metodoPago" id="metodoPago3" onchange="handleCheckboxChange(3)"></td>
                    <td>Tarjeta 3</td>
                    <td>**** **** **** 9012</td>
                    <td>Mark Johnson</td>
                    <td>09/24</td>
                  </tr>
                  <tr>
                    <td><input class="form-check-input" type="checkbox" name="metodoPago" id="metodoPago4" onchange="handleCheckboxChange(4)"></td>
                    <td>Tarjeta 4</td>
                    <td>**** **** **** 3456</td>
                    <td>Alice Johnson</td>
                    <td>12/26</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

              <form action="../controller/tiendaTokensC.php" method="post">
                <input type="hidden" value="" id="idPackToken" name="idPackToken">
                <!-- Aquí puedes agregar campos adicionales si es necesario -->
                <button type="submit" name="comprar" id="comprar" value="comprar" class="btn btn-primary">Comprar</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </article>


    <?php
    if ($notificacion == "ok") {
      print('<div id="notification" class="notification">');
      print('<span id="notification-message" class="notification-message"></span>');
      print('</div>');
    }


    ?>





  </main>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    const buttons = document.querySelectorAll('.btn-amarillo');

    // Agregar el evento click a cada botón
    buttons.forEach(button => {
      button.addEventListener('click', () => {
        // Obtener el idPackToken de la tarjeta
        const idPackToken = button.parentElement.querySelector('.idPackToken').value;

        // Establecer el idPackToken en el modal
        document.querySelector('#myModal input[name="idPackToken"]').value = idPackToken;
      });
    });

    function handleCheckboxChange(checkboxNumber) {
      // Desmarcar todos los checkboxes excepto el seleccionado
      for (let i = 1; i <= 4; i++) {
        if (i !== checkboxNumber) {
          document.getElementById('metodoPago' + i).checked = false;
        }
      }
    }

    // Obtén la referencia del elemento de la ventana emergente
    const notification = document.getElementById('notification');
    const notificationMessage = document.getElementById('notification-message');

    // Función para mostrar la ventana emergente con un mensaje específico
    function showNotification(message) {
      notificationMessage.textContent = message;
      notification.classList.add('show');

      // Ocultar la ventana emergente después de 5 segundos
      setTimeout(() => {
        hideNotification();
      }, 5000);
    }

    // Función para ocultar la ventana emergente
    function hideNotification() {
      notification.classList.remove('show');
    }

    // Ejemplo de uso
    window.addEventListener('load', () => {
      showNotification('Comprado correctamente');
    });
  </script>
</body>

</html>
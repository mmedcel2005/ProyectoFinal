<!DOCTYPE html>
<html>
<head>
  <title>Ruleta de tokens</title>
  <style>
    .roulette {
      width: 400px;
      height: 400px;
      border-radius: 50%;
      border: 2px solid #000;
      position: relative;
      overflow: hidden;
    }

    .roulette::after {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 240px;
      height: 240px;
      border-radius: 50%;
      background-color: #ff0000;
    }

    #result {
      text-align: center;
      margin-top: 20px;
      font-size: 24px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="roulette"></div>
  <button onclick="spinRoulette()">Girar</button>
  <p id="result"></p>

  <script>
    function spinRoulette() {
      var tokens = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100]; // Cantidad de tokens predefinidos
      var tokenWon = tokens[Math.floor(Math.random() * tokens.length)]; // Elige una cantidad aleatoria de tokens
      
      var roulette = document.querySelector('.roulette');
      roulette.style.animation = 'spin 3s ease-in-out';
      
      setTimeout(function() {
        roulette.style.animation = '';
        document.getElementById('result').innerHTML = "¡Has ganado " + tokenWon + " tokens!";
      }, 3000);
    }
  </script>
</body>
</html>

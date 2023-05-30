<!DOCTYPE html>
<html>
<head>
    <title>Ruleta de tokens</title>
    <style>
        html,
        body,
        button {
            font-family: Arial, "돋움", Dotum, "굴림", Gulim, "Apple SD Gothic Neo", AppleGothic, sans-serif;
        }

        button {
            border: 0;
            margin: 0;
            padding: 0;
        }

        .title {
            margin-top: 50px;
            text-align: center;
        }

        .box-roulette {
            position: relative;
            margin: 50px auto;
            width: 500px;
            height: 500px;
            border: 10px solid #ccc;
            border-radius: 50%;
            background: #ccc;
            overflow: hidden;
        }

        .box-roulette .markers {
            position: absolute;
            left: 50%;
            top: 0;
            margin-left: -25px;
            width: 0;
            height: 0;
            border: 25px solid #fff;
            border-left-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            z-index: 9999;
        }

        .box-roulette .roulette {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .box-roulette .item {
            position: absolute;
            top: 0;
            width: 0;
            height: 0;
            border: 0 solid transparent;
            transform-origin: 0 100%;
        }

        .box-roulette .label {
            position: absolute;
            left: 0;
            top: 0;
            color: #fff;
            white-space: nowrap;
            transform-origin: 0 0;
        }

        .box-roulette .label .text {
            display: inline-block;
            font-size: 20px;
            font-weight: bold;
            line-height: 1;
            vertical-align: middle;
        }

        #btn-start {
            display: block;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -50px 0 0 -50px;
            width: 100px;
            height: 100px;
            font-weight: bold;
            background: #fff;
            border-radius: 50px;
            z-index: 9999;
            cursor: pointer;
        }

        /* Estilos para el modal */

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <p class="title">¡Gana tokens gratis en la ruleta!</p>

    <div class="box-roulette">
        <div class="markers"></div>
        <button type="button" id="btn-start">
            ¡Girar la ruleta!
        </button>
        <div class="roulette" id="roulette"></div>
    </div>

    <div id="result-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>¡Has ganado tokens!</h2>
            <p id="tokens-earned">0 tokens</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        (function($) {
            $.fn.extend({
                roulette: function(options) {
                    // Código JS del plugin

                    // ...

                    function rotation() {
                        var completeA = 360 * r(5, 10) + r(0, 360);

                        $roulette.rotate({
                            angle: angle,
                            animateTo: completeA,
                            center: ["50%", "50%"],
                            easing: easing,
                            callback: function() {
                                var currentA = $(this).getRotateAngle();
                                var tokens = calculateTokens(currentA);

                                showModal(tokens);
                            },
                            duration: speed
                        });
                    }

                    function calculateTokens(angle) {
                        // Definir los premios y sus respectivos ángulos
                        var prizes = [
                            { angle: 0, tokens: 10 },
                            { angle: 60, tokens: 50 },
                            { angle: 120, tokens: 100 },
                            { angle: 180, tokens: 200 },
                            { angle: 240, tokens: 500 },
                            { angle: 300, tokens: 1000 }
                        ];

                        // Calcular los tokens ganados según el ángulo obtenido
                        for (var i = 0; i < prizes.length; i++) {
                            var prize = prizes[i];
                            if (angle >= prize.angle && angle < prize.angle + 60) {
                                return prize.tokens;
                            }
                        }

                        return 0; // Si no se encuentra un premio válido, se ganan 0 tokens
                    }

                    function showModal(tokens) {
                        $('#tokens-earned').text(tokens + ' tokens');
                        $('#result-modal').css('display', 'block');
                    }

                    // ...

                    $btnStart.on("click", function() {
                        rotation();
                    });

                    // ...

                }
            });
        })(jQuery);

        $(function() {
            $('.box-roulette').roulette();

            // Cerrar el modal al hacer clic en la "X"
            $('.close').on('click', function() {
                $('#result-modal').css('display', 'none');
            });
        });
    </script>

</body>

</html>

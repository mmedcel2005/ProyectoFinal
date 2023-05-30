<!DOCTYPE html>
<html>
<head>
    <title>Ruleta de tokens</title>
    <style>
        /* Estilos CSS */

        /* ... */

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

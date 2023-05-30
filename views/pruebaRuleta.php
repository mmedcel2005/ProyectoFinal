<!DOCTYPE html>
<html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
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
    </style>
</head>

<body>
    <p class="title">본의아니 행운의 여보세요?</p>

    <div class="box-roulette">
        <div class="markers"></div>
        <button type="button" id="btn-start">
            돌려 돌려<br>돌림판
        </button>
        <div class="roulette" id="roulette"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
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

                                console.log(currentA);
                            },
                            duration: speed
                        });
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
        });
    </script>


</body>

</html>
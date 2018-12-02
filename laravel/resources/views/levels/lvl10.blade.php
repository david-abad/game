<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Space Invaders</title>
    <link rel="stylesheet" href="/../css/styleLvl1.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
    <!--
        1. HTML
        2. CSS
        3. div.background 1200x800
        4. div.hero 50x50
        5. move left / right (bonus: move up/down)  (bonus: move hero with mouse)
        6. fire 17x47
        7. game loop
        8. div.enemy
        9. enemy objects / enemy movement
        10. collision detection
    -->
    <div id="ganaste" class="fin">
        <h1>¡Ganaste!</h1>
        <p>Recibiste 35 créditos</p>
    </div>
    <div id="perdiste" class="fin">
        <h1>Has perdido</h1>
    </div>
    <div id="background">
        <div id="hero"></div>
        <div id="missiles"></div>
        <div id="enemies"></div>

        <div class="centered">
            <img id="img2" src="/../lvl1/vida.png" class="imgz" />
            <img id="img1" src="/../lvl1/vida.png" class="imgz" />
            <img id="img0" src="/../lvl1/vida.png" class="imgz" />
        </div>
    </div>

    <script>
        var audio = new Audio('/../sounds/lvl1.mp3');
        $("#ganaste").hide();
        $("#perdiste").hide();
        // audio.play();

        var hero = {
            left: 575,
            top: 510
        };

        var a = 3;
        var missiles = [];

        var enemies = [];
        /*var enemies = [{
                left: randomleft(),
                //right: 200,
                top: randomtop()
            },
            {
                left: randomleft(),
                //right: 900,
                top: randomtop()
            }
        ]; */
        for (var i = 0; i < 10; i++) {
            enemies[i] = {
                left: randomleft(),
                top: randomtop()
            }
        }


        document.onkeydown = function (e) {
            if (e.keyCode === 37) {
                // Left
                if (hero.left >= 200) {
                    hero.left = hero.left - 10;
                }
            }
            if (e.keyCode === 39) {
                // Right

                if (hero.left <= 900) {
                    hero.left = hero.left + 10;
                }

            }
            if (e.keyCode === 32) {
                // Spacebar (fire)
                var audio = new Audio('/../sounds/disparo.mp3');
                audio.play();
                missiles.push({
                    left: hero.left + 20,
                    top: hero.top - 20
                });
                drawMissiles()
            }
            drawHero();
        }


        function moveMissiles() {
            for (var i = 0; i < missiles.length; i++) {
                missiles[i].top = missiles[i].top - 12
            }
        }

        function drawHero() {
            document.getElementById('hero').style.left = hero.left + 'px';
            document.getElementById('hero').style.right = hero.right + 'px';
            document.getElementById('hero').style.top = hero.top + 'px';
        }

        function drawEnemies() {
            document.getElementById('enemies').innerHTML = ""
            for (var i = 0; i < enemies.length; i++) {
                document.getElementById('enemies').innerHTML +=
                    `<div class='enemy' style='left:${enemies[i].left}px; top:${enemies[i].top}px'></div>`;
            }
        }


        function drawMissiles() {
            document.getElementById('missiles').innerHTML = ""
            for (var i = 0; i < missiles.length; i++) {
                document.getElementById('missiles').innerHTML +=
                    `<div class='missile1' style='left:${missiles[i].left}px; top:${missiles[i].top}px'></div>`;
            }
        }


        function moveEnemies() {
            for (var i = 0; i < enemies.length; i++) {

                if (enemies[i].top >= 650) {
                    for (var i = 0; i < enemies.length; i++) {
                        enemies[i] = {
                            left: randomleft(),
                            top: randomtop()
                        }
                    }
                } else {
                    enemies[i].top = enemies[i].top + 12;
                }

            }
        }

        function collisionDetection() {
            for (var enemy = 0; enemy < enemies.length; enemy++) {
                for (var missile = 0; missile < missiles.length; missile++) {
                    if (
                        missiles[missile].left >= enemies[enemy].left &&
                        missiles[missile].left <= (enemies[enemy].left + 50) &&
                        missiles[missile].top <= (enemies[enemy].top + 50) &&
                        missiles[missile].top >= enemies[enemy].top
                    ) {
                        enemies.splice(enemy, 1);
                        missiles.splice(missiles, 1);
                        var audio = new Audio('/../sounds/destruirEnemigo.wav');
                        audio.play();
                        if (enemies.length == 0) {
                            win();
                        }
                    }
                }
            }
        }


        function collisionDetectionNave() {

            for (var enemy = 0; enemy < enemies.length; enemy++) {
                if (
                    hero.left >= (enemies[enemy].left - 50) &&
                    hero.left <= (enemies[enemy].left + 50) &&
                    hero.top <= (enemies[enemy].top + 50) &&
                    hero.top >= (enemies[enemy].top + 40)
                ) {
                    enemies.splice(enemy, 1);
                    a--;
                    //alert(a);
                    if (a > 0) {
                        $("#img" + a).remove();
                        var audio = new Audio('/../sounds/perderVida.wav');
                        audio.play();
                    } else {
                        perder();
                    }

                }

            }

        }

        function randomleft() {
            return Math.random() * (900 - 200) + 200;
        }

        function randomtop() {
            return Math.random() * (400 - 50) + 50;
        }

        function win() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/ul/{{$user}}/10",
                dataType: "json",
                method: "post"
            }).success(function (response) {
                if (response.result == 'Ok') {
                    var audio = new Audio('/../sounds/ganar.wav');
                    $("#ganaste").fadeIn("slow", function () {
                        // Animation complete
                    });
                    audio.play();
                    audio.onended = function () {
                        window.open("/{{$user}}", "_self");
                    }

                }
            });
        }

        function perder() {
            var audio = new Audio('/../sounds/perder.wav');
            $("#perdiste").fadeIn("slow", function () {
                // Animation complete
            });
            audio.play();
            audio.onended = function () {
                window.open("/{{$user}}", "_self");
            }
        }

        function gameLoop() {
            setTimeout(gameLoop, 100);
            moveMissiles();
            drawMissiles();
            moveEnemies();
            drawEnemies();
            collisionDetection();
            collisionDetectionNave();
        }

        gameLoop()

    </script>
</body>

</html>

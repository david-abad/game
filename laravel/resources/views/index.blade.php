<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Juego TSW</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <style>
        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }
        @font-face {
        font-family: Space;
        src: url('SPACEBAR.ttf');
        }
        @font-face {
            font-family: New Space;
            src: url('New Space.ttf');
        }
        h1{
            font-family: Space;
            text-align: center;
            text-shadow: 2px 2px black;
            font-size: 60px;
        }
        .dropdown-content{
            width: 250px;
            right: 25px !important;
        }
        .dropdown-content-mobile{
            width: 100%;
            right: 25px !important;
        }
        .dropdown_element:hover{
            background-color: #212121 !important;
        }
        .card_s{
            display: flex;
            flex-wrap: wrap;
            min-height: 80vh;
        }
        .img_top{
            background-color: black;
            height: 100px;
        }
        .btn-juego{
            width: 100%;
            margin-top: 25px;
        }
        .hoverable:hover{
            background-color: rgb(76, 19, 150);
            opacity: 1.0;
            -webkit-transition: background 0.2s linear;
            -moz-transition: background 0.2s linear;
            -o-transition: background 0.2s linear;
            -ms-transition: background 0.2s linear;
            transition: background 0.2s linear;
        }
        .objetos{
            height: 150px;
            border-radius: 10px;
            cursor: pointer;
        }

        .tienda{
            /* overflow-y: scroll; */
            /* overflow-x: hidden; */
            max-height: 600px !important;
            padding-bottom: -100px;
        }

        @media only screen and (max-width: 720px) {
                .card_s{
                    min-height: unset;
                }
                .objetos{
                    width: 161px !important;
                }
        }
    </style>
</head>

<body class="black">
    <header>
        <nav class="grey darken-4 z-depth-0">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo" style="font-family: Space; margin-left: 25px;">Juego TSW</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="dropdown-trigger valign-wrapper" data-target='user_dropdown2'><img class="left" src={{ $users->avatar }}
                                style="width:50px; padding:5px;">{{ $users->nombre }}</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <main>
            <div class="row">
                <div class="col s12 l4">
                    <div class="card_s card grey darken-4" style="margin-top: 25px;">
                        <div class="card-content white-text" style="width: 100%;">
                            <span class="card-title">Jugar</span>
                            <a class="waves-effect green accent-4 btn btn-juego">Comenzar juego</a>
                            <a id="selNivel" class="waves-effect indigo accent-3 btn btn-juego">Seleccionar nivel</a>
                            <a class="waves-effect white btn btn-juego" style="color: #3B5998;"><img src="https://img.icons8.com/material/50/3b5998/facebook-f.png"
                                    class="material-icons left" style="width: 25px; margin-top: 5px;">Compartir</a>
                            <a class="btn-flat btn-juego" style="cursor: default;"></a>
                            <a id="reiniciar" class="waves-effect red darken-3 btn btn-juego">Reiniciar</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 l8">
                    <div class="card_s card grey darken-4" style="margin-top: 25px;">
                        <div class="card-content white-text">
                            <div class="row">
                                <div class="col s12 l4">
                                    <span class="card-title">Tienda</span>
                                </div>
                                <div class="col s12 l3 offset-l5">
                                    <div class="row valign">
                                        <div class="col s2 l6">
                                            <img src="coins.png" style="height: 50px; margin-right: 320px; margin-top: 5px;">
                                        </div>
                                        <div class="col s1 l6 right-align">
                                            <p>Créditos</p>
                                            <p style="font-size: 25px; font-weight: bold;">{{ $users->creditos }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div id="style-1" class="card grey transparent z-depth-0 tienda scrollbar" style="margin-top: -20px; width: 100%;">
                                        <div class="row force-overflow">
                                            @foreach($objetos as $tmp)
                                            <div class="col s6 m3 l3 hoverable objetos">
                                                <div class="col-content center-align" style="margin: 5px;">
                                                    <img class="" src="{{ $tmp->archivo }}" style="height: 80px; margin-top: 5px;">
                                                    <p class="white-text">{{$tmp->nombre}}</p>
                                                    <div class="row center-align" style="margin-left: 15px;">
                                                        <div class="col s3 right-align">
                                                            <img src="coins.png" style="width: 25px;">
                                                        </div>
                                                        <div class="col s9 left-align" style="font-weight: bold; font-size: 18px;">
                                                            <p> {{ $tmp->costo }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Mobile view -->
    <ul class="sidenav grey darken-4" id="mobile-demo">
        <li><a class="white-text grey darken-3 valign-wrapper"><img class="right valign" src= "{{ $users->avatar }}" style="width:50px; padding:5px; margin-right: 10px;">{{
                $users->nombre }}</a></li>
        <li><a class="white-text valign-wrapper">Cambiar avatar</a></li>
        <li><a class="white-text valign-wrapper">Cerrar sesión</a></li>
    </ul>
    <!-- Dropdown Structure -->
    <ul id='user_dropdown2' class='dropdown-content grey darken-3'>
        <li class="dropdown_element"><a class="white-text">Cambiar avatar</a></li>
        <li class="dropdown_element"><a class="white-text">Cerrar sesión</a></li>
    </ul>
</body>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.dropdown-trigger').dropdown({
            constrainWidth: false,
            closeOnClick: false,
            coverTrigger: false
        });
        $('select').formSelect();
        $('.sidenav').sidenav();
        if ({{ $users->nivelActual }} == 1) {
            $("#selNivel").addClass("disabled");
            $("#reiniciar").addClass("disabled");
        }
    });

</script>

</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#212121" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        body{
            background-image: url("background.jpeg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        /* Checando que esto funcione */
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
        .btn{
            border-radius: 20px;
            z-index: 0;
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
            border-radius: 10px;
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
            background-color: rgb(59, 0, 94);
            opacity: 1.0;
            -webkit-transition: background 0.2s linear;
            -moz-transition: background 0.2s linear;
            -o-transition: background 0.2s linear;
            -ms-transition: background 0.2s linear;
            transition: background 0.2s linear;
        }
        .hoverable{
            opacity: 1.0;
            -webkit-transition: background 0.5s linear;
            -moz-transition: background 0.5s linear;
            -o-transition: background 0.5s linear;
            -ms-transition: background 0.5s linear;
            transition: background 0.5s linear;
        }
        .objetos{
            height: 150px;
            border-radius: 10px;
            cursor: pointer;
        }
        .browser-default{
            border: none;
        }
        @media only screen and (max-width: 720px) {
                .card_s{
                    min-height: unset;
                }
                .objetos{
                    width: 161px !important;
                }
        }
        @media only screen and (max-width: 520px) {
                .brand-logo{
                    font-size: 22px !important;
                    margin-left: -10px !important;
                }
        }
        
    </style>
</head>

<body class="black">
    <header>
        <nav class="z-depth-0" style="background: rgba(21, 21, 21, 0.9) !important;">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo" style="font-family: Space; margin-left: 25px;">Juego TSW</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="dropdown-trigger valign-wrapper" data-target='user_dropdown2'><img id="avatar1" class="left" src="img_obj/{{ $users->avatar }}"
                                style="width:50px; padding:5px;">{{ $users->nombre }}</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <main>
            <div class="row">
                <div class="col s12 l4">
                    <div class="card_s card grey darken-4" style="margin-top: 25px; background: rgba(21, 21, 21, 0.9) !important;">
                        <div class="card-content white-text" style="width: 100%;">
                            <span class="card-title" style="font-size: 30px;">Jugar</span>
                            <form action="/start/{{$users->nivelActual}}/{{$users->id}}" enctype="multipart/form-data" method="post">
                                {{csrf_field()}}    
                                <button id="startGame" type="submit" class="waves-effect green accent-4 btn btn-juego">Comenzar juego</button>
                            </form>
                            <a id="selNivel" class="waves-effect indigo accent-3 btn btn-juego modal-trigger" data-target="modalNiveles">Seleccionar nivel</a>
                            <a class="waves-effect white btn btn-juego" style="color: #3B5998;"><img src="https://img.icons8.com/material/50/3b5998/facebook-f.png"
                                    class="material-icons left" style="width: 25px; margin-top: 5px;">Compartir</a>
                          <a class="btn-flat btn-juego" style="cursor: default;"></a>
                            <a id="reiniciar" class="waves-effect red darken-3 btn btn-juego modal-trigger" data-target="modalReiniciar">Reiniciar</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 l8">
                    <div class="card_s card grey darken-4" style="margin-top: 25px; background: rgba(21, 21, 21, 0.9) !important;">
                        <div class="card-content white-text">
                            <div class="row">
                                <div class="col s12 l4">
                                    <span class="card-title" style="font-size: 30px;">Tienda</span>
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
                                    <div id="style-1" class="card grey transparent z-depth-0" style="margin-top: -20px; width: 100%;">
                                        <div class="row">
                                            
                                            @foreach($objetos as $tmp)
                                                @php $bought=0; @endphp
                                                @foreach($compras as $comp)
                                                    @if($comp->id == $tmp->id) 
                                                        @php $bought=true; @endphp
                                                    @endif
                                                @endforeach
                                                <div class="col s6 m3 l3 hoverable objetos" onclick="buy({{$tmp->id}}, {{$bought}}, {{$tmp->costo}}, '{{$tmp->nombre}}', '{{$tmp->archivo}}')" style="margin: 0px;">
                                                    <div class="col-content center-align">
                                                        @if($bought)
                                                        <img class="" src="img_obj/bought/{{ $tmp->archivo }}" style="height: 80px; margin-top: 5px;">
                                                        @else
                                                        <img class="" src="img_obj/{{ $tmp->archivo }}" style="height: 80px; margin-top: 5px;">
                                                        @endif
                                                        <p class="white-text">{{$tmp->nombre}}</p>
                                                        <div class="row center-align" style="margin-left: 15px;">
                                                            <div class="col s3 right-align">
                                                                <img src="coins.png" style="width: 25px;">
                                                            </div>
                                                            <div class="col s9 left-align" style="font-weight: bold; font-size: 18px;">
                                                                <p style="margin-top: -2px;"> {{ $tmp->costo }} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php $bought = false; @endphp
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
    <!-- Modal selección de avatar y nave -->
    <div id="modalAvatar" class="modal grey darken-4" style="width: 400px;">
        <div class="modal-content grey darken-4">
            <h4 class="white-text">Cambiar mi avatar y mi nave</h4>
            <p class="white-text">Puedes elegir cualquier avatar que poseas:</p>
            <div class="input-field">
                <select id="avatarSelect" class="browser-default white-text grey darken-3">
                    <option value="luna.png" class="right white-text grey darken-3">Avatar Luna</option>        
                    @foreach($compras as $comp)
                        @if($comp->tipo == 1)
                            <option value="{{ $comp->archivo }}" class="righ white-text grey darken-3">{{ $comp->nombre }}</option>        
                        @endif
                    @endforeach
                </select>
            </div>
            <p class="white-text">Puedes elegir cualquier nave que poseas:</p>
            <div class="input-field">
                <select id="naveSelect" class="browser-default white-text grey darken-3">
                    <option value="nave1.png" class="right white-text grey darken-3">Nave default</option>        
                    @foreach($compras as $comp)
                        @if($comp->tipo == 0)
                            <option value="{{ $comp->archivo }}" class="righ white-text grey darken-3">{{ $comp->nombre }}</option>        
                        @endif
                    @endforeach
                </select>
            </div>
            <p class="white-text center-align" style="margin-top: 10px; font-weight: bold">¡Puedes conseguir más artículos en la tienda!</p>
        </div>
    <div class="modal-footer grey darken-4">
        <a class="modal-close white-text waves-effect waves-white btn-flat" style="font-weight: bold;">Cancelar</a>
        <a id="guardarAvatar" class="modal-close green-text waves-effect waves-white btn-flat" style="font-weight: bold;">Guardar</a>
    </div>
    </div>
    <!-- Modal selección de nivel -->
    <div id="modalNiveles" class="modal grey darken-4 modal-fixed-footer" style="width: 400px;">
        <div class="modal-content grey darken-4">
            <h4 class="white-text">Seleccionar nivel</h4>
            <p class="white-text">Puedes volver a jugar cualquier nivel que ya hayas superado. Tu progreso no se verá afectado.</p>
            @for($i=1;$i<11;$i++)
                @if($i <= $users->nivelActual)
                <form action="/start/{{$i}}/{{$users->id}}" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <button id="startGame" type="submit" class="waves-effect indigo accent-3 btn" style="width: 100%; margin: 5px;">Nivel {{$i}}</button>
                </form>
                @else
                <a class="waves-effect grey darken-2 btn" style="width: 100%; margin: 5px;"><i class="material-icons">lock</i></a>
                @endif
            @endfor
        </div>
    <div class="modal-footer fixed grey darken-4">
        <a class="modal-close white-text waves-effect waves-white btn-flat" style="font-weight: bold;">Cerrar</a>
    </div>
    </div>
    <!-- Modal reiniciar -->
    <div id="modalReiniciar" class="modal grey darken-4 modal-fixed-footer" style="width: 400px; height: 250px;">
        <div class="modal-content grey darken-4">
            <h4 class="white-text">¿Estás seguro?</h4>
            <p class="white-text">Perderás todo tu progreso pero no tus artículos adquiridos ni tus créditos acumulados.</p>
        </div>
        <div class="modal-footer fixed grey darken-4">
            <a class="modal-close white-text waves-effect waves-white btn-flat" style="font-weight: bold;">Cancelar</a>
            <a id="btnReiniciar" class="modal-close red-text waves-effect waves-white btn-flat" style="font-weight: bold;">Reiniciar progreso</a>
        </div>
    </div>
    <!-- Modal comprar -->
    <div id="modalComprar" class="modal grey darken-4 modal-fixed-footer" style="width: 400px;">
        <div class="modal-content grey darken-4">
            <h4 class="white-text">Comprar artículo</h4>
            <p id="producto" class="white-text"></p>
            <div class="center-align">
                <img class="center-align" id="compraImg" src="" style="height: 200px; margin-top: 25px;">
            </div>
        </div>
        <div class="modal-footer fixed grey darken-4">
            <a class="modal-close white-text waves-effect waves-white btn-flat" style="font-weight: bold;">Cancelar</a>
            <a id="btnComprar" class="modal-close green-text waves-effect waves-white btn-flat" style="font-weight: bold;">Comprar</a>
        </div>
    </div>
    <!-- Mobile view -->
    <ul class="sidenav grey darken-4" id="mobile-demo">
        <li><a class="white-text indigo darken-3 valign-wrapper"><img id="avatar2" class="right valign" src= "img_obj/{{ $users->avatar }}" style="width:50px; padding:5px; margin-right: 10px;">{{$users->nombre }}</a></li>
        <li><a class="white-text valign-wrapper modal-trigger" data-target="modalAvatar">Cambiar avatar y nave</a></li>
        <li><a class="white-text valign-wrapper">Cerrar sesión</a></li>
    </ul>
    <!-- Dropdown Structure -->
    <ul id='user_dropdown2' class='dropdown-content grey darken-3'>
        <li class="dropdown_element"><a class="white-text modal-trigger" data-target="modalAvatar">Cambiar avatar y nave</a></li>
        <li class="dropdown_element"><a class="white-text">Cerrar sesión</a></li>
    </ul>
</body>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dropdown-trigger').dropdown({
            constrainWidth: false,
            closeOnClick: false,
            coverTrigger: false
        });
        $('select').formSelect();
        $('.sidenav').sidenav();
        if ({{ $users->nivelActual }} == 1) {
            $("#selNivel").hide();
            $("#reiniciar").hide();
        }
        $('.modal').modal();
        $('#guardarAvatar').click(function(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/uan/{{$users->id}}/" + $("#avatarSelect").val() + "/" + $("#naveSelect").val(),
                dataType: "json"
            }).success(function(response) {
               if(response.result == 'Ok'){
                   updateAvatar(response.avatar, response.nave);
               }
            });
        });
        $("#btnReiniciar").click(function(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/re/{{$users->id}}/",
                dataType: "json"
            }).success(function(response) {
                if(response.result == 'Ok'){
                    $("#selNivel").hide();
                    $("#reiniciar").hide();
                    M.toast({html: 'Tu progreso ha sido reiniciado'});
                    location.reload();
                }
            });
        });
    });

    function buy(id, bought, costo, nombre, archivo){
        if(bought!=1){
            var instance = M.Modal.getInstance($("#modalComprar"));
            $("#producto").text("Comprar " + nombre + " por " + costo + " créditos");
            $("#compraImg").attr('src', "img_obj/" + archivo);
            $("#btnComprar").click(function(){
                if(costo <= {{$users->creditos}}){
                    // Efectuar la compra
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/com/{{$users->id}}/"+id,
                        dataType: "json"
                    }).success(function(response) {
                        if(response.result == 'Ok'){
                            M.toast({html: 'Has comprado ' + nombre + ' con éxito'});
                            location.reload();
                        }
                    });
                }else{
                    instance.close();
                    M.toast({html: 'No tienes los créditos suficientes'});
                }
            });
            instance.open();
        }else{
            M.toast({html: 'Este producto ya lo compraste'});
        }
    }

    function updateAvatar(avatar, nave){
        $("#avatar1").attr("src","img_obj/"+avatar);
        $("#avatar2").attr("src","img_obj/"+avatar);
        M.toast({html: 'Tu avatar y tu nave han sido actualizados'});
    }
    
</script>

</html>

<?php


 session_start();

 require_once('../vendor/autoload.php');

 require_once('Auth.php');

 require_once('valRegistro.php');


?>

<!DOCTYPE html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="jquery.js"></script>
	<title></title>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130254869-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-130254869-1');
</script>

	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet"  href="assets/assets/css/bootstrap.css">
	<link rel="stylesheet"  href="assets/assets/css/font-awesome.css">
	<link rel="stylesheet"  href="assets/assets/css/bootstrap-social.css">
	<script src="jquery.js" charset="utf-8"></script>


</head>
<body>
	
	<div class="modal-dialog text-center">
		<div class="col-md-12 main-section">

			<div class = "modal-content main-section">
              
				<?php if(Auth::isLogin()): ?>
                 <h2> Hola <?php  echo  $_SESSION ['user']['name']?> </h2> 
                <a href="#" class="btn  btn-foursquare btn-lg text-center">JUGAR</a>
                <span></span>
                <a href="index.php" class="btn btn-danger">Cerrar Sesión  <?php Auth::logout();?> </a>
               <?php else: ?>

				<?php

				  Auth::getUserAuth();
				  valRegistro::getUserAuthEmail();
				?>
				
				<div class="col-8 user-img">
					
						<img src="pictures/nave.png" width="250px" height="200px"> </img>
					
				</div>
				<form class="col-8" method="post">
					
					<div class="form-group col-lg-12" id="form" >
               			 <input type="text"  class="form-control" name="user" id="user" placeholder="&#128231; Email" autofocus>
               		</div>
               		<div class="form-group col-lg-12" id="form">
               			 <input class="form-control" type="password" name="pass" id="pass" placeholder="&#128272; Contraseña" >
               		 </div>   
               		 <div class="col-lg-12 text-center">
					<a href="?login=Facebook" class="btn btn-block btn-social btn-facebook btn-md"><span class="fa fa-facebook"></span>Iniciar sesion con Facebook</a>
					<p></p>
					</div>
					
					<div class="col-lg-12 text-center">
					
					<a href="?login=Google" class="btn btn-block btn-social btn-google btn-md"><span class="fa fa-google"></span>Iniciar sesion con Google</a>
					</div>
					<a href="/reg/reg"> ¿No tienes cuenta? Registrate. </a>
					<p></p>
					

               		

					
					 <input id="xd" name="btnEnviar" class="btn  btn-foursquare btn-lg text-center" value="Login"/>
					
					<?php endif; ?>
				</form>
				
				
			</div>
		</div>
	</div>

</body>

<script type="text/javascript">
	$("#xd").click(function(){
		$.ajax({
            /* the route pointing to the post function */
            url: "/s",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            /* send the csrf-token and the input to the controller */
            data: {
                email: $("#user").val(),
				pass: $("#pass").val()
            },
            dataType: 'json',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) {
                window.open("/" + data.id, "_SELF");
            }
        });
	});
</script>

</html>
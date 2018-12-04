<?php


 session_start();

 require_once('../vendor/autoload.php');

 require_once('valRegistro.php');
?>

<!DOCTYPE html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130254869-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-130254869-1');
</script>

	<link rel="stylesheet" type="text/css" href="../main.css">
	<link rel="stylesheet"  href="../assets/assets/css/bootstrap.css">
	<link rel="stylesheet"  href="../assets/assets/css/font-awesome.css">
	<link rel="stylesheet"  href="../assets/assets/css/bootstrap-social.css">
	<script src="../jquery.js" charset="utf-8"></script>


</head>
<body>
	
	<div class="modal-dialog text-center">
		<div class="col-md-8 main-section">
			<div class = "modal-content">
              
               

				 <?php

				  valRegistro::getUserAuth();
				?>
				
				
				<form class="col-8"  method="post">
					<p></p>
					<div class="form-group "  >
               			 <input type="text"  class="form-control" name="name" id="name" placeholder="&#128100;Nombre de Usuario" autofocus>
               		</div>
               		<p></p>
               		<div class="form-group" >
               			 <input type="text"  class="form-control" name="email" id="email" placeholder="&#9993;Correo electronico" autofocus>
               		</div>
               		<p></p>
               		<div class="form-group" >
               			 <input class="form-control"  type="password" name="pass" id="pass" placeholder="&#128100;Contraseña" >
               		 </div> 
               		 <p></p>  
               		 
               		  
               		 <input href="/1" name="btnEnviar" class="btn  btn-foursquare btn-lg text-center" type="submit" value="Registrar"/>
               		 <p></p>
               		
					
				</form>
				
				
			</div>
		</div>
	</div>

</body>
</html>
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
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
               			 <input type="text"  class="form-control" name="name" id="name" placeholder="🧔🏻 Nombre de Usuario" autofocus>
               		</div>
               		<p></p>
               		<div class="form-group" >
               			 <input class="form-control"  type="password" name="pass" id="pass" placeholder="💳 Contraseña" >
						</div> 
						<p></p>
               		<div class="form-group" >
               			 <input class="form-control"  type="password" name="pass2" id="pass2" placeholder="💳 Repite tu contraseña" >
               		 </div> 
               		 <p></p>  
               		 
               		  
               		 <input id="reg" name="btnEnviar" class="btn  btn-foursquare btn-lg text-center" value="Registrar"/>
               		 <p></p>
               		
					
				</form>
				
				
			</div>
		</div>
	</div>

</body>

<script type="text/javascript">
	$(document).ready(function(){
		$("#reg").click(function(){
			if($("#pass").val() == $("#pass2").val()){
				$.ajax({
					/* the route pointing to the post function */
					url: "/reg",
					type: 'POST',
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					/* send the csrf-token and the input to the controller */
					data: {
						name: $("#name").val(),
						pass: $("#pass").val()
					},
					dataType: 'json',
					/* remind that 'data' is the response of the AjaxController */
					success: function (data) {
						if(data.result == "Ok"){
							window.open("/", "_SELF");
						}else{
							alert("Ha ocurrido un error");
						}
					}
				});
			}else{
				alert("Las contraseñas no coinciden");
			}
		});
	});
</script>

</html>
<?php 
session_start();
if (isset($_SESSION['username'])) {

session_destroy();

}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ACCESO ADMINISTRATIVO</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="uploads/Surtimart.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
<!-- sweetalert-->	
	<script src="../js/sweetalert/sweetalert.min.js"></script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../img/logos/PNG/Surtimartlogooficial.png" alt="IMG">
				</div>

				<div style="margin-left: 1% ">
					<span class="login100-form-title">
						ACCESO ADMINISTRATIVO
					</span>

					<div class="wrap-input100 validate-input" data-validate = "validar correo: ex@abc.xyz">
						<input class="input100" type="text" name="email" id="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" id="pass" placeholder="Clave">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" onclick="login()">
							INGRESAR
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							
						</span>
						<a class="txt2" href="#">
							
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
						
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>
    <script type="text/javascript">
    	
    	function login() {
    		
        user=$('#username').val();
        pass=$('#pass').val();

    $.ajax({url:'../consultas/loguear.php'//ruta a donde queremos ir 
    ,type:'POST'//metodo 
    ,data:'user=' + user + '&pass=' + pass//variables
    ,success: function(data){
    //alert(data);
    if (data==3) {
    //Lanzamos el alert 
    swal("UPss!", "Estos campos son requeridos", "error");
    }
    if(data==1){

    //Lanzamos el alert 
    swal("Bienvenido!", "Cargando cuenta administrativa", "success");
    setTimeout("location.href='dashboard.php'",1000);

    }
    if(data==0) {

    //Lanzamos el alert 
    swal("ERROR!", "Credenciales Incorrectas", "error");
    setTimeout("location.href='index.php'",1000);

    }




    }
    ,error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
    }
    });

    	}


    </script>
</body>
</html>
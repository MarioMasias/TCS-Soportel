<?php 
session_start();

if(isset($_SESSION['usuario'])){
	require '../admin/config.php';

	require 'funciones.php';

	$conexion = conexion($bd_config);

	if(!$conexion){
		echo 'ERROR CONEXION';
		//header('Location: error.php');
	}

	$solicitudes= datos_realizado2($conexion);


	if(!$solicitudes){
		echo 'ERROR POST';
		//header('Location: error.php');
	}
	  require 'views/servidor_registro.view.php';
	  
	}
	else {
		header('Location: login.php');
	}
 ?>


 </body>
 </html>
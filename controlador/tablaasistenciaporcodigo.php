<?php 
session_start();

if(isset($_SESSION['usuario'])){
	

	   require '../views/intranet.view.php';
	  require '../views/tablaasistenciaporcodigo.view.php';

	}
	else {
		header('Location: login.php');
	}
 ?>


 </body>
 </html>
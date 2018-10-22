<?php session_start();

require '../admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);

if(!$conexion){
	header('Location: error.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$trabajador=limpiarDatos($_POST['trabajador']);
	$usuario=limpiarDatos($_POST['usuario']);
	$objeto=limpiarDatos($_POST['objeto']);
	$descripcion=limpiarDatos($_POST['descripcion']);
	$lugar=limpiarDatos($_POST['lugar']);

	$statement=$conexion->prepare(
		'INSERT INTO objetos_perdidos(id,trabajador,usuario,objeto,descripcion,lugar)
		VALUES (null,:trabajador,:usuario,:objeto,:descripcion,:lugar)'
		);

	$statement->execute(array(
		':trabajador'=>$trabajador,
		':usuario'=>$usuario,
		':objeto'=>$objeto,
		':descripcion'=>$descripcion,
		':lugar'=>$lugar,
		));

	header('Location: lista_objetos_perdidos.php');
}

require '../views/registar_objeto_perdido.view.php';

 ?>
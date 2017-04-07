<?php
header ( 'Cache-Control: no-cache, must-revalidate' );
header ( 'Content-type: application/json' );
if (! empty ( $_POST )) {
	include '../configAdmin.php';
	$controller = new AdministratorController();
	if($controller->loginUser($_POST['user'], $_POST['pass'])){
		$programas_array = array ("codigo"=>"OK","mensaje"=>"Bienvenid@ {$_SESSION["nombre"]}");
	}else{
		$programas_array = array ("codigo"=>"BAD","mensaje"=>"Combinación de correo y password no encontrada en el sistema.");
	}
	echo json_encode ( $programas_array );
} else {
	echo json_encode ( array () );
}
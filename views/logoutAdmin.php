<?php
header ( 'Cache-Control: no-cache, must-revalidate' );
header ( 'Content-type: application/json' );
include '../configAdmin.php';
$controller = new AdministratorController ();
if ($controller->logoutUser ()) {
	$programas_array = array (
			"codigo" => "OK",
			"mensaje" => "Sessión verrada, vuelva pronto" 
	);
} else {
	$programas_array = array (
			"codigo" => "BAD",
			"mensaje" => "No se pudo cerrar la sesión." 
	);
}
echo json_encode ( $programas_array );
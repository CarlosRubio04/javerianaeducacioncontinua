<?php
header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');
include '../config.php';
$controller = new LandingController();
$entidades=$controller->loadCategorias($_GET['facultad']);
$programas_array=array();
foreach ($entidades as $value) {
	$programas_array[]=array(
			"valor"=>$value->getPkId(),
			"texto"=>  utf8_encode($value->getVnombre())
	);
}
echo json_encode($programas_array);
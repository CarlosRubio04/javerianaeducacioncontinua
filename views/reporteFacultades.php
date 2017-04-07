<?php
include '../configAdmin.php';
if (! empty ( $_SESSION )) {
	header ( 'Content-Type: text/csv; charset=utf-8' );
	header ( 'Content-Disposition: attachment; filename=Facultades.csv' );
	$controller = new AdministratorController ();
	$entidades = $controller->downloadFacultades ();
	$programas_array = array ();
	$output = fopen ( 'php://output', 'w' );
	fputcsv ( $output, array (
			'ID',
			'FACULTAD',
			'ESTADO' 
	), ';' );
	foreach ( $entidades as $value ) {
		$programas_array = array (
				$value->getPkId (),
				$value->getVnombre (),
				($value->getIestado () == 0) ? 'Inactivo' : 'Activo' 
		);
		fputcsv ( $output, $programas_array, ';' );
	}
} else {
	die ( "No tiene permisos!!" );
}
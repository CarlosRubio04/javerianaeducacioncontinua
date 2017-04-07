<?php
include '../configAdmin.php';
if (! empty ( $_SESSION )) {
	header ( 'Content-Type: text/csv; charset=utf-8' );
	header ( 'Content-Disposition: attachment; filename=Registrados.csv' );
	$controller = new AdministratorController ();
	$entidades = $controller->downloadRegisters();
	$programas_array = array ();
	$output = fopen ( 'php://output', 'w' );
	fputcsv ( $output, array (
			'ID',
			'FACULTAD',
			'CATEGORIA',
			'PROGRAMA',
			'NOMBRES',
			'APELLIDOS',
			'EMAIL',
			'FECHA INICIO',
			'CELULAR',
			'IP REGISTRO',
			'FUENTE',
			'CONTACTAR' 
	),';',' ');
	foreach ( $entidades as $value ) {
		$programas_array = array (
				$value->getPkId(),
				$value->getLpjProgramaPk()->getLpjFacultadPk()->getVnombre(),
				$value->getLpjProgramaPk()->getLpjCategoriaPk()->getVnombre (),
				$value->getLpjProgramaPk()->getVnombre(),
				$value->getVnombre(),
				$value->getVapellido(),
				$value->getVemail(),
				date ( 'Y-m-d', $value->getDtfechaRegistro()->getTimestamp()),
				$value->getIcelular(),
				$value->getVip(),
				$value->getVtarget(),
				($value->getIcontactar() == 0) ? 'No Contactar' : 'Contactar' 
		);
		fputcsv ( $output, $programas_array,';',' ');
	}
} else {
	die ( "No tiene permisos!!" );
}
<?php
include '../configAdmin.php';
if (! empty ( $_SESSION )) {
	header ( 'Content-Type: text/csv; charset=utf-8' );
	header ( 'Content-Disposition: attachment; filename=Programas.csv' );
	$controller = new AdministratorController ();
	$entidades = $controller->downloadProgramas();
	$programas_array = array ();
	$output = fopen ( 'php://output', 'w' );
	fputcsv ( $output, array (
			'ID',
			'FACULTAD',
			'CATEGORIA',
			'NOMBRE',
			'HORAS',
			'FECHA INICIO',
			'PERFIL',
			'¿EN QUE CONSISTE?',
			'¿POR QUÉ HACER ESTE DIPLOMADO?',
			'ESTADO'
	), ';' );
	foreach ( $entidades as $value ) {
		$programas_array = array (
				$value->getPkId (),
				$value->getLpjFacultadPk()->getVnombre(),
				$value->getLpjCategoriaPk()->getVnombre(),
				$value->getVnombre(),
				$value->getIhoras(),
				date('y-m-d',$value->getDinicio()->getTimestamp()),
				$value->getVperfil(),
				$value->getVdescripcion(),
				$value->getVdetalle(),
				($value->getIestado () == 0) ? 'Inactivo' : 'Activo' 
		);
		fputcsv ( $output, $programas_array, ';' );
	}
} else {
	die ( "No tiene permisos!!" );
}
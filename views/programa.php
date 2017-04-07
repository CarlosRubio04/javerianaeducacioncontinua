<?php

header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');
if (!empty($_GET ['programa'])) {
    include '../config.php';
    $controller = new LandingController();
    $programa = $controller->loadPrograma($_GET ['programa']);
    $obj = new stdClass ();
    $obj->id = $programa->getPkId();
    $obj->nombre = utf8_encode($programa->getVnombre());
    $obj->perfil = utf8_encode($programa->getVperfil());
    $obj->precio = '$'.number_format($programa->getIvalor(),0,',','.');
    $obj->horas = $programa->getIhoras();
    $obj->descripcion = utf8_encode($programa->getVdescripcion());
    $obj->detalle = utf8_encode($programa->getVdetalle());
    $obj->fecha = date('y-m-d', $programa->getDinicio()->getTimestamp());
    $obj->dia = date('d', $programa->getDinicio()->getTimestamp());
    $obj->mes = $controller->getNombreMes(date('m', $programa->getDinicio()->getTimestamp()));
    $obj->categoria = $programa->getLpjCategoriaPk()->getPkId();
    $obj->categoria_nombre = $programa->getLpjCategoriaPk()->getVnombre();
    $obj->facultad = $programa->getLpjFacultadPk()->getPkId();
    $obj->facultad_nombre = utf8_encode($programa->getLpjFacultadPk()->getVnombre());
   // print_r($programa->getLpjFacultadPk());
    $obj->telefono = $programa->getVtelefono();
    $obj->url_img = $programa->getVurlImagen();
    $obj->url_video = $programa->getVurlVideo();
    echo json_encode($obj);
} else {
    echo json_encode(array());
}

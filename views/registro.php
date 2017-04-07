<?php

header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');
if (!empty($_POST)) {
    include '../config.php';
    $controller = new LandingController ();
    if ($controller->sendMail($_POST)) {
        $programas_array = array("codigo" => "OK", "mensaje" => "Tus datos han sido registrados correctamente, nos comunicaremos contigo muy pronto para resolver todas tus inquietudes.");
    } else {
        $programas_array = array("codigo" => "BAD", "mensaje" => "No fue posible registrar tus datos, verifica la información e intenta nuevamente.");
    }
    echo json_encode($programas_array);
}
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/EjercicioModernizacion/Backend/modelo/Domicilio.php';
header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $domicilio = new Domicilio();
        $domicilio->insertarDatosDomicilioDB(,$_POST['codigoPostal'],$_POST['direccion'],$_POST['ciudad'], $_POST['departamento'],$_POST['provincia'],$_POST['pais']);
}

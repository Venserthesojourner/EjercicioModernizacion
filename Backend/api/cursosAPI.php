<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/EjercicioModernizacion/Backend/modelo/Cursos.php';
header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $cursos = new Cursos();
        $cursos->insertarDatosCursos($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['modalidad'], $_POST['cupo'], $_POST['precio']);
        break;
    case 'GET':
        if (isset($_GET['legajo'])) {
            $cursos = new Cursos();
            $datos = $cursos->recuperarDatosCursosDB($_GET['legajo']);
            echo  $datos->recuperarDatosCursosJSON();
        } else {
            $cursos = Cursos::recuperarListadoCursosDB($_GET['modalidad']);
            echo json_encode($cursos);
        }
        break;
}
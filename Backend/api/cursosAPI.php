<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/EjercicioModernizacion/Backend/modelo/Cursos.php';
header('Content-Type: application/json');

$curso = new Cursos();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $curso->insertarDatosCursoDB($_POST['legajo'], $_POST['nombre_curso'],$_POST['descripcion_curso'],$_POST['modalidad']);
        echo $curso->recuperarDatosCursoJSON();
        break;
    case 'GET':
        if (isset($_GET['legajo'])) {
            $datos = $curso->recuperarDatosCursoDB($_GET['legajo']);
            $curso->insertarDatosCurso($datos['legajo'],$datos['nombre_curso'],$datos['descripcion_curso'],$datos['modalidad']);
            echo  $curso->recuperarDatosCursoJSON();
        } else {
            $cursos = Cursos::recuperarListadoCursosDB($_GET['modalidad']);
            echo json_encode($cursos);
        }
        break;
    case 'PUT':
        $_PUT = json_decode(file_get_contents('php//input'),true);
        $curso->actualizarDatosCursoDB();
        break;
    case 'DELETE':
        Cursos::eliminarDatosCursoDB($_GET['legajo']);
        break;
}
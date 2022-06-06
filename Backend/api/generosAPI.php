<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/EjercicioModernizacion/Backend/modelo/Genero.php';
header('Content-Type: application/json');

$genero= new Genero();

switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'), true);
            $genero->insertarDatosGeneroDB($_POST['nombre_genero'],$_POST['tag_genero']);
            echo $genero->recuperarDatosGeneroJSON();
            break;
        case 'GET':
            if(isset($_GET['genero_id'])){
                $datos = $genero->recuperarDatosGeneroDB($_GET['genero_id']);
                $genero->completarGenero($datos['genero_id'],$datos['nombre_genero'],$datos['tag_genero']);
                echo $genero->recuperarDatosGeneroJSON();}
            else{
                $generos = Genero::recuperarListadoGenerosDB();
                echo json_encode($generos);
            }
            break;
        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'), true);
            $genero->actualizarDatosGeneroDB($_GET['genero_id'],$_PUT['nombre_genero'],$_PUT['tag_genero']);
            break;
        case 'DELETE':
            Genero::eliminarDatosGeneroDB($_GET['genero_id']);
            break;
}
<?php
//header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT'] . '/EjercicioModernizacion/Backend/modelo/Persona.php';

// Carga Inicial desde el Endpoint provisto
$url = "http://weblogin.muninqn.gov.ar/api/Examen";
$personas = json_decode(file_get_contents($url),true);
//

/*switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $persona = new Persona();
        $persona->insertarDatosPersona($_POST['id'],$_POST['nombre'],$_POST['apellido'],$_POST['fechaNacimiento'],$_POST['genero'], $_POST['direccion'], $_POST['codigoPostal']);
        $persona->insertarDatosPersonaDB();
        break;
    case 'GET':
        if(isset($_GET['id'])){
            $persona = new Persona();
            $persona->id = $_GET['id'];
            $persona->recuperarDatosPersonaDB();
            echo $persona->recuperarDatosPersonaJSON();}
        else{
            $personas = Persona::listarPersonas();
            echo json_encode($personas);
        }
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
}*/
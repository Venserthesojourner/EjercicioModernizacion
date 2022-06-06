<?php
//header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT'] . '/EjercicioModernizacion/Backend/modelo/Persona.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/EjercicioModernizacion/Backend/modelo/Genero.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/EjercicioModernizacion/Backend/modelo/Domicilio.php';

$persona = new Persona();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $persona->insertarDatosPersona($_POST['dni'],$_POST['nombre'],$_POST['apellido'],$_POST['fechaNacimiento'],$_POST['genero'], $_POST['domicilio'], $_POST['codigoPostal']);
        $persona->insertarDatosPersonaDB();
        break;
    case 'GET':
        if(isset($_GET['documento'])){
            $datos = $persona::recuperarDatosPersonaDB($_GET['documento']);
            $persona->insertarDatosPersona(
                $datos['documento'],
                $datos['nombre'],
                $datos['apellido'],
                $datos['fechaNacimiento'],
                $datos['genero'],
                $datos['direccion'],
                $datos['codigoPostal']
            );
            $persona->recuperarDatosPersonaJSON();}
        else{
            $personas = Persona::recuperarListadoPersonasDB();
            json_encode($personas);
        }
        break;
    case 'PUT':
        $_PUT = json_decode(file_get_contents('php//input'),true);
        $persona->insertarDatosPersona(
            $datos['documento'],
            $datos['nombre'],
            $datos['apellido'],
            $datos['fechaNacimiento'],
            $datos['genero'],
            $datos['direccion'],
            $datos['codigoPostal']
        );
        $persona->actualizarDatosPersonaDB();
        break;
    case 'DELETE':
        Persona::eliminarPersonaDB($_GET['documento']);
        break;
}
<?php
include_once 'Genero.php';

class Persona
{
    private int $id;
    private string $nombre;
    private string $apellido;
    private DateTime $fechaNacimiento;
    private Genero $genero;

    public function __construct(){
        $this->id = 0;
        $this->nombre = "";
        $this->apellido = "";
        $this->fechaNacimiento = new DateTime();
        $this->genero = new Genero();
    }
    public function insertarDatosPersona($id,$nombre,$apellido, $fechaNacimiento,$genero): void
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->genero = $genero;
    }
    public function recuperarDatosPersona(): array
    {
        $datos = array();
        $datos['id'] = $this->id;
        $datos['nombre'] = $this->nombre;
        $datos['apellido'] = $this->apellido;
        $datos['fechaNacimiento'] = $this->fechaNacimiento->format('d/m/Y');
        $datos['genero'] = $this->genero->recuperarDatosGenero();
        return $datos;
    }
}
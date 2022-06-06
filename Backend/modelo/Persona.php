<?php
include_once 'Genero.php';


class Persona
{
    private int $documento;
    private string $nombre;
    private string $apellido;
    private string $direccion;
    private DateTime $fechaNacimiento;
    private Genero $genero;
    private Domicilio $codigoPostal;

    // TODO: Mejorar la modularizacion de la base de datos

    public function __construct(){
        $this->documento = 0;
        $this->nombre = "";
        $this->apellido = "";
        $this->fechaNacimiento = new DateTime();
        $this->genero = new Genero();
        $this->direccion = "";
        $this->codigoPostal = new Domicilio();
    }
    public function insertarDatosPersona($documento,$nombre,$apellido,$fechaNacimiento,$genero,$direccion,$codigoPostal): void{
        $this->documento = $documento;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->genero = $genero;
        $this->direccion = $direccion;
        $this->codigoPostal = $codigoPostal;
    }
 
    public function recuperarDatosPersona(): array{
        $datos = array();
        $datos['documento'] = $this->documento;
        $datos['nombre'] = $this->nombre;
        $datos['apellido'] = $this->apellido;
        $datos['fechaNacimiento'] = $this->fechaNacimiento;
        $datos['genero'] = $this->genero;
        $datos['direccion'] = $this->direccion;
        $datos['codigoPostal'] = $this->codigoPostal;
        return $datos;
    }

    public function recuperarDatosPersonaJSON(): string
    {
        return json_encode($this->recuperarDatosPersona());
    }

    // Operaciones del CRUD de
    // la tabla persona

    // CREATE

    public function insertarDatosPersonaDB(): void
    {
        $conexion = new Conector();
        $sql = "INSERT INTO persona (documento, nombre, apellido, fechaNacimiento, genero, direccion, codigoPostal) VALUES (?,?,?,?,?,?,?)";
        $resultado = $conexion->prepare($sql);
        $resultado->bind_param("isssssss", $this->documento, $this->nombre, $this->apellido, $this->fechaNacimiento, $this->genero, $this->direccion, $this->codigoPostal);
        $resultado->execute();
        $conexion->close();
    }

    // READ

    public static function recuperarDatosPersonaDB($documento): array{
        $conexion = new Conector();
        $sql = "SELECT * FROM persona WHERE documento = '".$documento."'";
        $resultado = $conexion->query($sql);
        $fila = $resultado->fetch_assoc();
        $conexion->close();
        return array(
            'documento' => $fila['documento'],
            'nombre' => $fila['nombre'],
            'apellido' => $fila['apellido'],
            'fechaNacimiento' => $fila['fechaNacimiento'],
            'genero' => $fila['genero'],
            'direccion' => $fila['direccion'],
            'codigoPostal' => $fila['codigoPostal']);
    }

    public static function recuperarListadoPersonasDB(): array{
        $conexion = new mysqli("localhost", "root", "", "modernizacion_cursos");
        $sql = "SELECT * FROM persona";
        $resultado = $conexion->query($sql);
        $personas = array();
        while ($fila = $resultado->fetch_assoc()) {
            $persona = new Persona();
            $persona->documento = $fila['documento'];
            $persona->nombre = $fila['nombre_persona'];
            $persona->apellido = $fila['apellido_persona'];
            $persona->direccion= $fila['direccion'];
            $persona->fechaNacimiento = new DateTime($fila['fecha_nacimiento']);
            $persona->genero = Genero::recuperarGeneroDB($fila['genero']);
            $persona->codigoPostal = Domicilio::recuperarDatosDomicilioDB($fila['codigo_postal']);
            $personas[] = $persona;
        }
        $conexion->close();
        return $personas;
    }

    // UPDATE

    public function actualizarDatosPersonaDB(): void{
        $conexion = new Conector();
        $sql = "UPDATE persona SET nombre = '".$this->nombre."', apellido = '".$this->apellido."', fechaNacimiento = '".$this->fechaNacimiento->format('Y-m-d')."', genero = '".$this->genero->id."' WHERE documento = '".$this->documento."'";
        $conexion->query($sql);
        $conexion->close();
    }
    
    // DELETE

    public static function eliminarPersonaDB($documento): void{
        $conexion = new Conector();
        $sql = "DELETE FROM persona WHERE documento = '".$documento."'";
        $conexion->query($sql);
        $conexion->close();
    }
}
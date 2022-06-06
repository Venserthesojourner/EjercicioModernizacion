<?php
include_once 'Genero.php';


class Persona
{
    private int $id;
    private string $nombre;
    private string $apellido;
    private DateTime $fechaNacimiento;
    private Genero $genero;
    private string $direccion;
    private CodigoPostal $codigoPostal;

    // TODO: Mejorar la modularizacion de la base de datos

    public function __construct(){
        $this->id = 0;
        $this->nombre = "";
        $this->apellido = "";
        $this->fechaNacimiento = new DateTime();
        $this->genero = new Genero();
        $this->direccion = "";
        $this->codigoPostal = new CodigoPostal();
    }
    public function insertarDatosPersona($id,$nombre,$apellido, $fechaNacimiento,$genero,$direccion,$codigoPostal): void
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
        $genero = Genero::recuperarGeneroDB($genero);
        $this->genero->insertarDatosGenero($genero['id'],$genero['nombre'],$genero['tag']);
        $this->direccion = $direccion;
        $codigoPostal = CodigoPostal::recuperarCodigoPostalDB($codigoPostal);
        $this->codigoPostal = $codigoPostal;
    }
    //Getters y Setters
    public function getId(): int
    {
        return $this->id;
    }
    public function getApellido(): string
    {
        return $this->apellido;
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

    public function recuperarDatosPersonaJSON(): string
    {
        return json_encode($this->recuperarDatosPersona());
    }

    // Operaciones del CRUD de
    // la tabla persona

    // CREATE

    public function insertarDatosPersonaDB(): void{
        $conexion = new mysqli("localhost", "root", "", "modernizacion_cursos");
        $sql = "INSERT INTO persona (id, nombre, apellido, fechaNacimiento, genero) VALUES ('".$this->id."','".$this->nombre."','".$this->apellido."','".$this->fechaNacimiento->format('Y-m-d')."','".$this->genero->id."')";
        $conexion->query($sql);
        $conexion->close();
    }

    // READ

    public function recuperarDatosPersonaDB(): void{
        $conexion = new mysqli("localhost", "root", "", "modernizacion_cursos");
        $sql = "SELECT * FROM persona WHERE id = '".$this->id."'";
        $resultado = $conexion->query($sql);
        $fila = $resultado->fetch_assoc();
        $this->id = $fila['id'];
        $this->nombre = $fila['nombre'];
        $this->apellido = $fila['apellido'];
        $this->fechaNacimiento = new DateTime($fila['fechaNacimiento']);
        $this->genero = new Genero();
        $this->genero->id = $fila['genero'];
        $conexion->close();
    }

    public static function listarPersonas(): array{
        $conexion = new mysqli("localhost", "root", "", "modernizacion_cursos");
        $sql = "SELECT * FROM persona";
        $resultado = $conexion->query($sql);
        $personas = array();
        while ($fila = $resultado->fetch_assoc()) {
            $persona = new Persona();
            $persona->id = $fila['id'];
            $persona->nombre = $fila['nombre'];
            $persona->apellido = $fila['apellido'];
            $persona->fechaNacimiento = new DateTime($fila['fechaNacimiento']);
            $persona->genero = Genero::recuperarGeneroDB($fila['genero']);
            $personas[] = $persona;
        }
        $conexion->close();
        return $personas;
    }

    // UPDATE

    public function modificarPersonaDB(): void{
        $conexion = new mysqli("localhost", "root", "", "modernizacion_cursos");
        $sql = "UPDATE persona SET nombre = '".$this->nombre."', apellido = '".$this->apellido."', fechaNacimiento = '".$this->fechaNacimiento->format('Y-m-d')."', genero = '".$this->genero->id."' WHERE id = '".$this->id."'";
        $conexion->query($sql);
        $conexion->close();
    }
    
    // DELETE

    public function eliminarPersonaDB(): void{
        $conexion = new mysqli("localhost", "root", "", "modernizacion_cursos");
        $sql = "DELETE FROM persona WHERE id = '".$this->id."'";
        $conexion->query($sql);
        $conexion->close();
    }
}
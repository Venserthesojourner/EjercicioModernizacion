<?php
include_once 'Conector.php';
class Cursos{
    private int $legajo;
    private string $nombreCurso;
    private string $descripcion;
    private string $modalidad;
    //

    public function __construct(){
        $this->legajo = 0;
        $this->nombreCurso = "";
        $this->descripcion = "";
        $this->modalidad = "";
    }

    public function insertarDatosCurso($legajo,$nombreCurso,$descripcion,$modalidad): void{
        $this->legajo = $legajo;
        $this->nombreCurso = $nombreCurso;
        $this->descripcion = $descripcion;
        $this->modalidad = $modalidad;
    }

    public function recuperarDatosCurso(): array{
        $datos = array();
        $datos['legajo'] = $this->legajo;
        $datos['nombre_curso'] = $this->nombreCurso;
        $datos['descripcion_curso'] = $this->descripcion;
        $datos['modalidad'] = $this->modalidad;
        return $datos;
    }
    public function recuperarDatosCursoJSON(): string{
        $datos = $this->recuperarDatosCurso();
        return json_encode($datos);
    }
    public static function recuperarListadoCursosDB($modalidad): array
    {
        $conexion = new Conector();
        $sql = "SELECT * FROM cursos WHERE modalidad = '" . $modalidad . "'";
        $resultado = $conexion->query($sql);
        $conexion->close();
        $listadoCursos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $listadoCursos[] = array('legajo' => $fila['legajo'], 'nombre_curso' => $fila['nombre_curso'], 'descripcion_curso' => $fila['descripcion_curso'], 'modalidad' => $fila['modalidad']);
        }
        return $listadoCursos;
    }

    public function insertarDatosCursoDB(): void
    {
        $conexion = new Conector();
        $sql = "INSERT INTO curso (legajo, nombre_curso, descripcion,modalidad) VALUES ('".$this->legajo."','".$this->nombreCurso."','".$this->descripcion."','".$this->modalidad."')";
        $conexion->query($sql);
        $conexion->close();
    }
    public function actualizarDatosCursoDB(): void
    {
        $conexion = new Conector();
        $sql = "UPDATE curso SET nombre_curso = '".$this->nombreCurso."', descripcion = '".$this->descripcion."',modalidad = '".$this->modalidad."' WHERE legajo = '".$this->legajo."'";
        $conexion->query($sql);
        $conexion->close();
    }
    public function eliminarDatosCursoDB(): void
    {
        $conexion = new Conector();
        $sql = "DELETE FROM curso WHERE legajo = '".$this->legajo."'";
        $conexion->query($sql);
        $conexion->close();
    }

}
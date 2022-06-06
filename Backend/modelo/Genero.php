<?php
//Constantes de conexion
include_once 'Conector.php';

class Genero
{

    private int $id_genero;
    private string $nombre_genero;
    private string $tag_genero;

    public function __construct()
    {
        $this->id_genero = 0;
        $this->nombre_genero = "";
        $this->tag_genero = ""; // El tag_genero es una abreviación de nombre_genero, ej: Para el genero "Hombre" el tag_genero seria "H"
    }

    /**
     * @return int
     */
    public function getIDGenero(): int
    {
        return $this->id_genero;
    }

    public function completarGenero($id_genero, $nombre_genero, $tag_genero): void
    {
        $this->id_genero = $id_genero;
        $this->nombre_genero = $nombre_genero;
        $this->tag_genero = $tag_genero;
    }

   public function recuperarDatosGenero(): array
    {
        return array('id_genero' => $this->id_genero, 'nombre_genero' => $this->nombre_genero, 'tag_genero' => $this->tag_genero);
    }

    public function recuperarDatosGeneroJSON(): string
    {
        return json_encode($this->recuperarDatosGenero());
    }

    // Metodos de acceso a la base de datos

    public static function recuperarDatosGeneroDB($id_genero): array
    {
        $conexion = new Conector();
        $sql = "SELECT * FROM genero WHERE genero_id = '" . $id_genero . "'";
        $resultado = $conexion->query($sql);
        $fila = $resultado->fetch_assoc();
        $conexion->close();
        return array('genero_id' => $fila['genero_id'], 'nombre_genero' => $fila['nombre_genero'], 'tag_genero' => $fila['tag_genero']);
    }

    public static function recuperarListadoGenerosDB(): array
    {
        $conexion = new Conector();
        $sql = "SELECT * FROM genero";
        $resultado = $conexion->query($sql);
        $conexion->close();
        $listado = array();
        while ($fila = $resultado->fetch_assoc()) {
            $listado[] = array('genero_id' => $fila['genero_id'], 'nombre_genero' => $fila['nombre_genero'], 'tag_genero' => $fila['tag_genero']);
        }

        return $listado;
    }

    public function insertarDatosGeneroDB($nombre, $tag_genero): void
    {
        $conexion = new Conector();
        $sql = "INSERT INTO genero (nombre_genero, tag_genero) VALUES ('" . $nombre . "', '" . $tag_genero . "')";
        $resultado = $conexion->query($sql);

        $last_id = $conexion->insert_id;
        $this->completarGenero($last_id, $nombre, $tag_genero);


        $conexion->close();
    }

    public function actualizarDatosGeneroDB($id, $nombre, $tag_genero): void
    {
        $conexion = new Conector();
        $sql = "UPDATE genero SET nombre_genero = '" . $nombre . "', tag_genero = '" . $tag_genero . "' WHERE genero_id = '" . $id . "'";
        $resultado = $conexion->query($sql);
        $conexion->close();
    }
    public static function eliminarDatosGeneroDB($id): void
    {
        $conexion = new Conector();
        $sql = "DELETE FROM genero WHERE genero_id = '" . $id . "'";
        $resultado = $conexion->query($sql);
        $conexion->close();
    }
}



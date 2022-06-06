<?php
include_once 'Conector.php';

class Domicilio
{
    private int $codigo_postal; // Se corresponde con la clave primaria del registro en la base de datos
    private string $direccion;
    private string $ciudad;
    private string $departamento;
    private string $provincia;
    private string $pais;

    public function __construct(){
        $this->codigo_postal = 0;
        $this->direccion = "";
        $this->ciudad = "";
        $this->departamento = "";
        $this->provincia = "";
        $this->pais = "";
    }
    public function completarDomicilio($codigo_postal,$direccion,$ciudad,$departamento,$provincia,$pais): void
    {
        $this->codigo_postal = $codigo_postal;
        $this->direccion = $direccion;
        $this->ciudad = $ciudad;
        $this->departamento = $departamento;
        $this->provincia = $provincia;
        $this->pais = $pais;
    }
    public function recuperarDatosDomicilio (): array
    {
        $datos = array();
        $datos['codigo_postal'] = $this->codigo_postal;
        $datos['direccion'] = $this->direccion;
        $datos['ciudad'] = $this->ciudad;
        $datos['departamento'] = $this->departamento;
        $datos['provincia'] = $this->provincia;
        $datos['pais'] = $this->pais;
        return $datos;
    }
    public function recuperarDatosDomicilioJSON (): string
    {
        $datos = $this->recuperarDatosDomicilio();
        return json_encode($datos);
    }

    //Metodos de acceso a la base de datos
    public static function recuperarDatosDomicilioDB($codigo_postal){
        $conexion = new Conector();
        $sql = "SELECT * FROM domicilio WHERE codigo_postal = '" . $codigo_postal . "'";
        $resultado = $conexion->query($sql);
        $fila = $resultado->fetch_assoc();
        $conexion->close();
        return array('codigo_postal' => $fila['codigo_postal'], 'direccion' => $fila['direccion'], 'ciudad' => $fila['ciudad'], 'departamento' => $fila['departamento'], 'provincia' => $fila['provincia'], 'pais' => $fila['pais']);
    }

    public static function recuperarListadoDomiciliosDB(): array
    {
        $conexion = new Conector();
        $sql = "SELECT * FROM domicilio";
        $resultado = $conexion->query($sql);
        $listado = array();
        while ($fila = $resultado->fetch_assoc()) {
            $listado[] = array('codigo_postal' => $fila['codigo_postal'], 'direccion' => $fila['direccion'], 'ciudad' => $fila['ciudad'], 'departamento' => $fila['departamento'], 'provincia' => $fila['provincia'], 'pais' => $fila['pais']);
        }
        $conexion->close();
        return $listado;
    }
    public function insertarDatosDomicilioDB($codigo_postal,$direccion,$ciudad,$departamento,$provincia,$pais): void
    {
        $conexion = new Conector();
        $sql = "INSERT INTO domicilio (codigo_postal,direccion,ciudad,departamento,provincia,pais) VALUES ('" . $codigo_postal . "','" . $direccion . "','" . $ciudad . "','" . $departamento . "','" . $provincia . "','" . $pais . "')";
        $resultado = $conexion->query($sql);
        $conexion->close();
    }
    public function actualizarDatosDomicilioDB($codigo_postal,$direccion,$ciudad,$departamento,$provincia,$pais): void
    {
        $conexion = new Conector();
        $sql = "UPDATE domicilio SET direccion = '" . $direccion . "', ciudad = '" . $ciudad . "', departamento = '" . $departamento . "', provincia = '" . $provincia . "', pais = '" . $pais . "' WHERE codigo_postal = '" . $codigo_postal . "'";
        $resultado = $conexion->query($sql);
        $conexion->close();
    }
    public function eliminarDatosDomicilioDB($codigo_postal): void
    {
        $conexion = new Conector();
        $sql = "DELETE FROM domicilio WHERE codigo_postal = '" . $codigo_postal . "'";
        $resultado = $conexion->query($sql);
        $conexion->close();
    }

}
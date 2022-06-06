<?php

class Conector extends mysqli
{
    private $host;
    private $user;
    private $password;
    private $database;
    private $port;
    private $socket;
    private $conexion;


    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "modernizacion_cursos";
        $this->port = "3306";
        $this->socket = "";
        try{
            $this->conexion = parent::__construct($this->host, $this->user, $this->password, $this->database, $this->port, $this->socket);
            if( mysqli_connect_errno() ) {
                throw new exception(mysqli_connect_error(), mysqli_connect_errno());
            }
        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function getConexion(): mysqli
    {
        return $this->conexion;
    }

    public function close(): void
    {
        parent::close();
    }
}
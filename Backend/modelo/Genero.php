<?php

class Genero
{
    private int $id;
    private string $nombre;
    private string $tag;

    public function __construct(){
        $this->id = 0;
        $this->nombre = "";
        $this->tag = "";
    }
    public function recuperarDatosGenero():array { 
        return array('id' => $this->id, 'nombre' => $this->nombre, 'tag' => $this->tag); 
    }
}
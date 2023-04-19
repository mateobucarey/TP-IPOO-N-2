<?php

class ResponsableV {

    //ATRIBUTOS
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    //METODO CONSTRUCTOR
    public function __construct($numEmpleado, $numLicencia, $nombre, $apellido){
        $this -> numEmpleado = $numEmpleado;
        $this -> numLicencia = $numLicencia;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
    }

    //METODO DE ACCESO GET
    public function getNumEmpleado(){
        return $this -> numEmpleado;
    }

    public function getNumLicencia(){
        return $this -> numLicencia;
    }

    public function getNombre(){
        return $this -> nombre;
    }

    public function getApellido(){
        return $this -> apellido;
    }

    //METODO DE ACCESO SET
    public function setNombre($nuevoNombre){
        $this -> nombre = $nuevoNombre;
    }

    public function setApellido($nuevoApellido){
        $this -> apellido = $nuevoApellido;
    }

    //DEVUELVE INFORMACION DE LOS ATRIBUTOS
    public function __toString(){
        return "Numero de empleado: ".$this -> getNumEmpleado(). "\n". 
        "Numero de licencia: ".$this -> getNumLicencia(). "\n".
        "Nombre del empleado: ".$this -> getNombre(). "\n".
        "Apellido del empleado: ".$this -> getApellido(). "\n"
        ;
    }
}
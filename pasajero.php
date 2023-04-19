<?php

class Pasajero {
    //ATRIBUTOS
    private $nombre;
    private $apellido;
    private $dni;
    private $numTelefono;

    //METODO CONSTRUCTOR
    public function __construct($nombre, $apellido, $dni, $numTelefono){
       $this -> nombre = $nombre;
       $this -> apellido = $apellido;
       $this -> dni = $dni;
       $this -> numTelefono = $numTelefono; 
    }

    //METODO ACCESO GET
    public function getNombre(){
        return $this -> nombre;
    }

    public function getApellido(){
        return $this -> apellido;
    }

    public function getDni(){
        return $this -> dni;
    }

    public function getNumTelefono(){
        return $this -> numTelefono;
    }

    //METODO DE ACCESO SET
    public function setNombre($nuevoNombre){
       $this -> nombre = $nuevoNombre;
    }

    public function setApellido($nuevoApellido){
       $this -> apellido = $nuevoApellido;
    }

    public function setDni($nuevoDni){
       $this -> dni = $nuevoDni;
    }

    public function setNumTelefono($nuevoNumTelefono){
       $this -> numTelefono = $nuevoNumTelefono;
    }

    //DEVUELVE INFORMACION DE LOS ATRIBUTOS
    public function __toString(){
        return "Nombre del pasajero: ".$this -> getNombre()."\n".
        "Apellido del pasajero: ".$this -> getApellido()."\n".
        "Numero de documento: ".$this -> getDni()."\n".
        "Numero de telefono: ".$this -> getNumTelefono()."\n";
    }
    
}
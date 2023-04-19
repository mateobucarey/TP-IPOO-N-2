<?php

class ViajeFeliz {

    //ATRIBUTOS
    private $codigo;
    private $destinoViaje;
    private $cantMaxPasajeros;
    private $objPasajero;
    private $objResponsableV;

    //METODO CONSTRUCTOR
    public function __construct($codigo, $destinoViaje, $cantMaxPasajeros, $objPasajero, $objResponsableV){
        $this -> codigo = $codigo;
        $this -> destinoViaje = $destinoViaje;
        $this -> cantMaxPasajeros = $cantMaxPasajeros;
        $this -> objPasajero = $objPasajero;
        $this -> objResponsableV = $objResponsableV;
    }

    //METODO DE ACCESO GET
    public function getCodigo(){
        return $this -> codigo;
    }

    public function getDestinoViaje(){
        return $this -> destinoViaje;
    }

    public function getCantMaxPasajeros(){
        return $this -> cantMaxPasajeros;
    }

    public function getObjPasajero() {
        return $this -> objPasajero;
    }

    public function getObjResponsableV(){
        return $this -> objResponsableV;
    }

    //METODO DE ACCESO SET
    public function setDestinoViaje($nuevoDestinoViaje){
        return $this -> destinoViaje = $nuevoDestinoViaje;
    }

    public function setCantMaxPasajeros($nuevoCantMaxPasajeros){
        return $this -> cantMaxPasajeros = $nuevoCantMaxPasajeros;
    }

    /**
     * Modifica el nombre de un pasajero
     * @param int $dni
     * @param string $nombre
     */
    public function modNombrePas($dni, $nombre){

        $i = 0; 
        $objPasajero = $this -> getObjPasajero();
        $cantPas = count($objPasajero);
        $valor = false;
    
        while($i < $cantPas && $valor == false){
            if ($objPasajero[$i] -> getDni() == $dni) {
                $objPasajero[$i] -> setNombre($nombre); 
                $valor = true;
            }
            $i++;
        }
    }

    /**
     * Modifica el apellido del pasajero
     * @param int $dni
     * @param string $apellido
     */
    public function modApellidoPas($dni, $apellido){

        $i = 0; 
        $objPasajero = $this -> getObjPasajero();
        $cantPas = count($objPasajero);
        $valor = false;
    
        while($i < $cantPas && $valor == false){
            if ($objPasajero[$i] -> getDni() == $dni) {
                $objPasajero[$i] -> setApellido($apellido); 
                $valor = true;
            }
            $i++;
        }
    }

    /**
     * Modifica el nombre del responsable del viaje
     * @param int $numEmpleado
     * @param string $nombre
     */
    public function modNombreRes($numEmpleado, $nombre){

        $i = 0; 
        $objResponsableV = $this -> getObjResponsableV();
        $cantPas = count($objResponsableV);
        $valor = false;
    
        while($i < $cantPas && $valor == false){
            if ($objResponsableV -> getNumEmpleado() == $numEmpleado) {
                $objResponsableV -> setNombre($nombre); 
                $valor = true;
            }
            $i++;
        }
    }

    /**
     * Modifica el apellido del responsable de viaje
     * @param int $numEmpleado
     * @param string $apellido
     */
    public function modApellidoRes($numEmpleado, $apellido){

        $i = 0; 
        $objResponsableV = $this -> getObjResponsableV();
        $cantPas = count($objResponsableV);
        $valor = false;
    
        while($i < $cantPas && $valor == false){
            if ($objResponsableV[$i] -> getNumEmpleado() == $numEmpleado) {
                $objResponsableV[$i] -> setApellido($apellido); 
                $valor = true;
            }
            $i++;
        }
    }

    /**
     * Busca un viaje segun el codigo y retorna un indice del arreglo viaje
     * @param int $codigoViaje
     * @param array $coleccionViaje
     */
    public function ingresarViaje($codigoViaje, $coleccionViaje){

        $n = count($coleccionViaje);
        $i = 0;
        while($i > $n &&  $coleccionViaje[$i] -> getCodigo() == $codigoViaje){
            return $i;
        }
    }

    //DEVUELVE LA INFORMACION DE LOS ATRIBUTOS
    public function __toString(){

        $objPasajero = $this -> getObjPasajero();
        return "Codigo de viaje: ".$this -> getCodigo(). "\n".
        "Destino del viaje: ". $this -> getDestinoViaje(). "\n".
        "Cantidad maxima del viaje: ".$this -> getCantMaxPasajeros(). "\n";
        for($i = 0; $i < $this -> getCantMaxPasajeros(); $i++){
            echo $objPasajero[$i];
        }
        echo $this -> getObjResponsableV();
    }

}    
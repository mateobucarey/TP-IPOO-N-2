<?php

include 'pasajero.php';
include 'responsableV.php';
include 'viajeFeliz.php';

/**
 * Imprime en pantalla un menú de opciones y
 * retorna un entero que representa la opcion elegida
 * @return int
 */
function menuDesplegable()
{
    // int $opcionElegida

    do{
        echo "-------------------------------------------------------------------------------------\n";
        echo "||                              [Viaje Feliz]                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "||                               Menú general                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [1] Crear un viaje nuevo                                                        ||\n";
        echo "|| [2] Mostrar un viaje                                                            ||\n";
        echo "|| [3] Modificar el nombre de un pasajero por su número de documento               ||\n";
        echo "|| [4] Modificar el apellido de un pasajero por su número de documento             ||\n";
        echo "|| [5] Modificar el nombre del responsable del viaje por su numero de empleado     ||\n";
        echo "|| [6] Modificar el apellido del responsable del viaje por su numero de empleado   ||\n";
        echo "|| [7] Modificar el destino del viaje                                              ||\n";
        echo "|| [8] Modificar la capacidad máxima de pasajeros del viaje                        ||\n";
        echo "|| [9] Mostrar informacion de un viaje                                             ||\n";
        echo "|| [0] Para finaizar el programa                                                   ||\n";
        echo "||                                                                                 ||\n";
        echo "-------------------------------------------------------------------------------------\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));

        // OBSERVAR: el rango varía según cantidad de opciones
        if($opcionElegida < 0 || $opcionElegida > 13){
            echo "\n";
            // Mensaje de error cuando la opción elegida está fuera de rango
            echo "--------------------------------------------------------------------------------\n";
            echo "|| ¡ERROR! Usted ha ingresado un valor NO válido,                             ||\n";
            echo "|| verifique las opciones del menú nuevamente.                                ||\n";
            echo "--------------------------------------------------------------------------------\n";
            detenerEjecucion();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 13);

    echo "\n";

    return $opcionElegida;  
}

/**
 * Este módulo solicita que se ingrese un valor con el simple objeto
 * de detener la ejecución del programa y así poder leer resultados sin que se vayan para arriba.
 * 
 */
function detenerEjecucion(){
    // string $presionarEnter

    echo "\n";

    do {
        // Mensaje de parada para leer los resultados
        echo "Presione [ENTER] para continuar. ";
        // Obligación de ingresar un valor para continuar la ejecución del código
        $presionarEnter = trim(fgets(STDIN));

    }while ($presionarEnter != "");

    echo "\n";
}

/**
 * Crea y retorna un arreglo de objetos de la clase Pasajeros
 * @param int $cantMaxPasajeros
 * @return array $pasajero
 */
function pasajeros($cantMaxPasajeros) {

    for ($i = 0; $i < $cantMaxPasajeros; $i++){
        echo "Ingrese los datos de todos los pasajeros \n";
        echo "Ingrese el nombre del pasajero numero " ;
        $nombre = trim(fgets(STDIN)); 
        echo "Ingrese el apellido: ";
        $apellido = trim(fgets(STDIN));
        echo "Ingrese el numero del documento: ";
        $dni = trim(fgets(STDIN));
        echo "Ingrese el numero de telefono: ";
        $telefono = trim(fgets(STDIN));
        $pasajero[$i] = new Pasajero($nombre, $apellido, $dni, $telefono);
    }
    
    return $pasajero;
}

/**
 * Crea y retorna un arreglo de objetos
 * @param object $viaje
 * @param array $coleccionViaje
 * @return array $coleccionViaje
 */
function viaje ($viaje, $coleccionViaje){

    $i = count($coleccionViaje);
    $coleccionViaje[$i] = $viaje; 
    return $coleccionViaje;
}

 //INICIALIZACION DE VARIABLES
$coleccionViaje = [];

//MENU DE OPCIONES
do {
    $opcionMenu = menuDesplegable();

    switch ($opcionMenu){
        case 1:
            // Crear un viaje nuevo
            echo "Ingrese el codigo de viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese un destino: ";
    $destino = trim(fgets(STDIN));
    echo "Ingrese la cantidad maxima de pasajeros: ";
    $cantMaxPasajeros = trim(fgets(STDIN));
    $pasajeros = pasajeros($cantMaxPasajeros);
    echo "Ingrese los datos del responsable del viaje";
    echo "Ingrese el numero de empleado: ";
    $numEmpleado = trim(fgets(STDIN));
    echo "Ingrese el numero de licencia: ";
    $numLicencia = trim(fgets(STDIN));
    echo "Ingrese el nombre: ";
    $nombreRes = trim(fgets(STDIN));
    echo "Ingrese el apellido: ";
    $apellidoRes = trim(fgets(STDIN));
    $responsableViaje = new ResponsableV($numEmpleado, $numLicencia, $nombreRes, $apellidoRes);
    $viaje = new ViajeFeliz($codigo, $destino, $cantMaxPasajeros, $pasajeros, $responsableViaje);

            $coleccionViaje = viaje($viaje, $coleccionViaje);
            
            print_r($coleccionViaje);
            detenerEjecucion();
            break;
        case 2:
            // Mostrar un viaje
            echo $viaje;
            detenerEjecucion();
            break;
        case 3:
            // Modificar el nombre de un pasajero por su número de documento
            echo "Ingrese el codigo del viaje al que desea ingresar ";
            $ingresarViaje = trim(fgets(STDIN));
            $indice = $viaje -> ingresarViaje($ingresarViaje, $coleccionViaje);
            echo "Ahora ingrese el numero de documento del pasajero que desea modificar ";
            $dniBuscar = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre ";
            $modNombre = trim(fgets(STDIN));
            $viaje[$indice] -> modNombrePas($dniBuscar, $modNombre);

            detenerEjecucion();
            break;    
        case 4:
            // Modificar el apellido de un pasajero por su número de documento
            echo "Ingrese el codigo del viaje al que desea ingresar ";
            $ingresarViaje = trim(fgets(STDIN));
            $indice = $viaje -> ingresarViaje($ingresarViaje, $coleccionViaje);
            echo "Ahora ingrese el numero de documento del pasajero que desea modificar ";
            $dniBuscar = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido ";
            $modApellido = trim(fgets(STDIN));
            $viaje[$indice] -> modApellidoPas($dniBuscar, $modApellido);
            
            detenerEjecucion();
            break;
        case 5:
            // Modificar el nombre del responsable del viaje por su numero de empleado
            echo "Ingrese el codigo del viaje al que desea ingresar ";
            $ingresarViaje = trim(fgets(STDIN));
            $indice = $viaje -> ingresarViaje($ingresarViaje, $coleccionViaje);
            echo "Ahora ingrese el numero del empleado que desea modificar ";
            $numEmpleadoBuscar = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre del responsable del viaje ";
            $modNombreRes = trim(fgets(STDIN));
            $viaje[$indice] -> modNombreRes($numEmpleadoBuscar, $modNombreRes);
            
            detenerEjecucion();
            break;
        case 6:
            // Modificar el apellido del responsable del viaje por su numero de empleado
            echo "Ingrese el codigo del viaje al que desea ingresar ";
            $ingresarViaje = trim(fgets(STDIN));
            $indice = $viaje -> ingresarViaje($ingresarViaje, $coleccionViaje);
            echo "Ahora ingrese el numero del empleado que desea modificar ";
            $numEmpleadoBuscar = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido del responsable del viaje ";
            $modApellidoRes = trim(fgets(STDIN));
            $viaje[$indice] -> modApellidoRes($numEmpleadoBuscar, $modApellidoRes);
            
            detenerEjecucion();
            break;
        case 7:
            // Modificar el destino del viaje
            echo "Ingrese el codigo del viaje al que desea ingresar ";
            $ingresarViaje = trim(fgets(STDIN));
            $indice = $viaje -> ingresarViaje($ingresarViaje, $coleccionViaje);
            echo "Ingrese el nuevo destino ";
            $modDestino = trim(fgets(STDIN));
            $viaje[$indice] -> setDestino($modDestino);

            detenerEjecucion();
            break;
        case 8:
            // Modificar la capacidad máxima de pasajeros del viaje
            echo "Ingrese el codigo del viaje al que desea ingresar ";
            $ingresarViaje = trim(fgets(STDIN));
            $indice = $viaje -> ingresarViaje($ingresarViaje, $coleccionViaje);
            echo "Ingrese una nueva cantidad maxima de pasajeros ";
            $modCantMaxPas = trim(fgets(STDIN));
            $viaje[$indice] -> setCantMaxPasajeros($modCantMaxPas);
            
            detenerEjecucion();
            break;
        case 9:
            // Mostrar informacion de un viaje
            echo "Ingrese el codigo del viaje para ver la informacion: ";
            $ingresarViaje = trim(fgets(STDIN));
            $indice = $viaje -> ingresarViaje($ingresarViaje, $coleccionViaje);
            echo $viaje[$indice];
            
            detenerEjecucion();
            break;
        case 0:
            // Finaliza el programa
            break;
        default:
            // En caso de error (imposible) accederá a esta opción
            break;
    }

} while ($opcionMenu != 0);

echo "¡PROGRAMA FINALIZADO!\n";
echo "\n";





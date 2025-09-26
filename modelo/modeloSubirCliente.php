<?php 
class modeloSubirCliente {

    function subirCedula($nombreArchivocsv) {
        //PROCESO DE CARGAR CSV A LA BASE DE DATOS
        date_default_timezone_set( 'America/Guayaquil' );
        $fechaActual = date("Y-m-d H:i:s");
        require('../includes/conexion.php');

$handle = fopen("../csv/".$nombreArchivocsv, "r");
while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
      $num = count($data);
      if($num == 11){
       
        $cadena = "INSERT INTO `informacion_cliente` (`cedula_info`, `fecha_info`, `nombre_info`, `correo_info`, `contrato_info`, `rango_info`, `director_info`, `gerente_info`, `supervisor_info`, `asesor_info`, `sucursal_info`, `mes_info`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', (SELECT MONTHNAME('$data[1]')));";
    
    if($mysqli->query($cadena)){
       
    } else {
        
     
        $mysqlerror = mysqli_error($mysqli);
        error_log(print_r($mysqlerror."-->".$cadena."\n", true), 3, "../log/cliente/".$fechaActual."_".$nombreArchivocsv.".log");
    }
      }else{
        error_log(print_r($data[0]."\n", true), 3, "../log/cliente/".$fechaActual."_".$nombreArchivocsv.".log");
      }
    

 
}

fclose($handle);
return true;


 	}



  function subirInfo($nombreArchivocsv) {
        //PROCESO DE CARGAR CSV A LA BASE DE DATOS
        date_default_timezone_set( 'America/Guayaquil' );
        $fechaActual = date("Y-m-d H:i:s");
        require('../includes/conexion.php');

$handle = fopen("../csv/".$nombreArchivocsv, "r");
while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
      $num = count($data);
      if($num == 5){
        $cadena = "INSERT INTO `telefono` (`cedula_telefono`, `numero_telefono`, `contacto_telefono`, `propietario_telefono`, `nombre_telefono`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]');";
    
    if($mysqli->query($cadena)){
       
    } else {
        
     
        $mysqlerror = mysqli_error($mysqli);
        error_log(print_r($mysqlerror."-->".$cadena."\n", true), 3, "../log/telefono/".$fechaActual."_".$nombreArchivocsv.".log");
    }
      }else{
        error_log(print_r($data[0]."\n", true), 3, "../log/telefono/".$fechaActual."_".$nombreArchivocsv.".log");
      }
    

 
}

fclose($handle);
return true;


 	}

 	}
 ?>
<?php
class modeloTelefono
{
    function agregarTelefono($cedula, $numeroTelefono, $contactoTelefono,$propietarioTelefono,$nombreTelefono,$user)
    {
        require('../includes/conexion.php');
        
        $sql = "INSERT INTO `telefono` (`cedula_telefono`, `numero_telefono`, `contacto_telefono`, `propietario_telefono`, `nombre_telefono`, `userCreacion_telefono`) 
        VALUES ('$cedula', '$numeroTelefono', '$contactoTelefono', '$propietarioTelefono', '$nombreTelefono', '$user');";
       
        if ($mysqli->query($sql)) {
            return true;
        } else {
            echo mysqli_error($mysqli);
        }
    }

    function mostrarTelefono($cedula)
    {
        require('../includes/conexion.php');

            $sql = "SELECT idtelefono,numero_telefono,contacto_telefono,propietario_telefono,nombre_telefono FROM telefono where cedula_telefono = '$cedula' and estado_telefono = 1";
       

        $resultado = $mysqli->query($sql);

        if ($resultado->num_rows > 0) {
            while ($fila = mysqli_fetch_assoc( $resultado )) {
                $arreglo["data"][]=$fila;
            }
            $m = $arreglo;
            return $m;
        } else {
            echo mysqli_error($mysqli);
        }
        
    }



    function actualizarTelefono($idTelefono, $numeroTelefono, $contactoTelefono,$propietarioTelefono,$nombreTelefono, $user)
    {
        require('../includes/conexion.php');
        date_default_timezone_set('America/Guayaquil');
        $fechaEdicion = strftime("%Y-%m-%d %H:%M:%S", time());
        
        $sql = "UPDATE `telefono` SET `numero_telefono` = '$numeroTelefono', `contacto_telefono` = '$contactoTelefono', `propietario_telefono` = '$propietarioTelefono', `nombre_telefono` = '$nombreTelefono', `fechaEditar_telefono` = '$fechaEdicion', `userEditar_telefono` = '$user' WHERE (`idtelefono` = '$idTelefono');";
       

        if ($mysqli->query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);            
        }
    }

    function borrarTelefono($id,$user)
    {
        require('../includes/conexion.php');
        date_default_timezone_set('America/Guayaquil');
        $fechaBorar = strftime("%Y-%m-%d %H:%M:%S", time());

        $sql = "UPDATE `telefono` SET `estado_telefono` = '0',`userBorrar_telefono` = '$user',`fechaBorrar_telefono` = '$fechaBorar' WHERE (`idtelefono` = '$id')";

        if ($mysqli->query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);
            
            
        }
    }
}
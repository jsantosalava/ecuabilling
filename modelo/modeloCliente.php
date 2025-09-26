<?php
class modeloCliente
{
    function agregarCliente($cliente, $cedula, $fecha,$contrato,$correo,$rango,$director,$supervisor,$asesor,$user,$gerente,$sucursal)
    {
        require('../includes/conexion.php');
        
        $sql = "SET lc_time_names = 'es_ES';";
        $sql .= "INSERT INTO `informacion_cliente` (`cedula_info`, `fecha_info`, `mes_info`, `nombre_info`, `correo_info`, `contrato_info`, `rango_info`, `director_info`, `gerente_info`, `supervisor_info`, `asesor_info`, `userCreacion_info`, `sucursal_info`) VALUES ('$cedula', '$fecha', (SELECT MONTHNAME('$fecha')), '$cliente', '$correo', '$contrato', '$rango', '$director', '$gerente', '$supervisor', '$asesor', '$user', '$sucursal');  ";


        if ($mysqli->multi_query($sql)) {
            return true;
        } else {
            echo mysqli_error($mysqli);
        }
    }

    function mostrarCliente()
    {
        require('../includes/conexion.php');

            $sql = "SELECT cedula_info,fecha_info,mes_info,nombre_info,correo_info,contrato_info,rango_info,director_info,gerente_info,supervisor_info,asesor_info,sucursal_info FROM informacion_cliente where estado_info = 1";
       

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

    function mostrarInfo($id)
    {
        require('../includes/conexion.php');

        $sql = "SELECT cedula_info,fecha_info,mes_info,nombre_info,correo_info,contrato_info,rango_info,director_info,gerente_info,supervisor_info,asesor_info,sucursal_info FROM informacion_cliente where estado_info = 1 and cedula_info = '$id' ";

        $resultado = $mysqli->query($sql);

        if ($resultado->num_rows > 0) {
            $fila=mysqli_fetch_assoc($resultado);
            
            return $fila;
        } else {
            echo mysqli_error($mysqli);
        }
        
    }


    function actualizarCliente($cliente,$cedula, $fecha, $contrato,$correo,$rango,$director,$gerente,$supervisor, $asesor,$sucursal, $user)
    {
        require('../includes/conexion.php');
        date_default_timezone_set('America/Guayaquil');
        $fechaEdicion = strftime("%Y-%m-%d %H:%M:%S", time());
        
        $sql = "SET lc_time_names = 'es_ES';";
        $sql .= "UPDATE `informacion_cliente` SET `fecha_info` = '$fecha', `mes_info` = (SELECT MONTHNAME('$fecha')), `nombre_info` = '$cliente', `correo_info` = '$correo', `contrato_info` = '$contrato', `rango_info` = '$rango', `director_info` = '$director', `gerente_info` = '$gerente', `supervisor_info` = '$supervisor', `asesor_info` = '$asesor', `sucursal_info` = '$sucursal', `fechaEditar_info` = '$fechaEdicion', `userEditar_info` = '$user' WHERE (`cedula_info` = '$cedula');";

        if ($mysqli->multi_query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);            
        }
    }

    function borrarCliente($id,$user)
    {
        require('../includes/conexion.php');
        date_default_timezone_set('America/Guayaquil');
        $fechaBorar = strftime("%Y-%m-%d %H:%M:%S", time());

        $sql = "UPDATE `informacion_cliente` SET `estado_info` = '0',`userBorrar_info` = '$user',`fechaBorrar_info` = '$fechaBorar' WHERE (`cedula_info` = '$id')";

        if ($mysqli->query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);
            
            
        }
    }
}
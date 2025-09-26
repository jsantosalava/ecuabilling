<?php
class modeloReporteInfo
{

    function mostrarReporteInfo($fecha_inicio,$fecha_fin)
    {
        require('../includes/conexion.php');

            $sql = "SELECT cedula_info,fecha_info,mes_info,nombre_info,correo_info,contrato_info,rango_info,director_info,gerente_info,supervisor_info,asesor_info,sucursal_info FROM informacion_cliente where estado_info = 1 and fecha_info between '$fecha_inicio' and '$fecha_fin' ";
       

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



}
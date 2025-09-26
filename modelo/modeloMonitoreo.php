<?php
class modeloMonitoreo
{

    function mostrarMonitoreo($fecha_inicio,$fecha_fin,$asesor)
    {
        require('../includes/conexion.php');

            $sql = "SELECT fechaCreacion_gestion,cedula_cliente,nombre_calltype,observacion_gestion,celular_gestion,rutaAudio_gestion FROM gestion_cliente left join calltype on calltype_gestion = idcalltype where asesor_gestion = '$asesor' and estado_gestion = 1 and fechaCreacion_gestion between '$fecha_inicio' and '$fecha_fin' ";
       

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
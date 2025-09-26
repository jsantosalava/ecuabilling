<?php
class modeloMotivo
{
    function agregarMotivo($nombreMotivo, $user)
    {
        require('../includes/conexion.php');

        $sql = "INSERT INTO `motivo` (`nombre_motivo`, `usercreacion_motivo`) VALUES ('$nombreMotivo', '$user');";

        if ($mysqli->query($sql)) {
            return true;
        } else {
            echo mysqli_error($mysqli);
        }
    }

    function mostrarMotivo()
    {
        require('../includes/conexion.php');

        $sql = "SELECT idmotivo,nombre_motivo FROM motivo where estado_motivo = 1";

        $resultado = $mysqli->query($sql);

        if ($resultado->num_rows > 0) {
            $a = 0;
            while ($fila = mysqli_fetch_array($resultado)) {
                $arreglobi[$a][0] = $fila[0];
                $arreglobi[$a][1] = $fila[1];
               
                $a++;
            }
            return $arreglobi;
        } else {
            echo mysqli_error($mysqli);
        }
        
    }

   

    function borrarMotivo($id,$user)
    {
        require('../includes/conexion.php');
        date_default_timezone_set('America/Guayaquil');
        $fechaBorar = strftime("%Y-%m-%d %H:%M:%S", time());

        $sql = "UPDATE `motivo` SET `estado_motivo` = '0',`userborrar_motivo` = '$user',`fechaborrar_motivo` = '$fechaBorar' WHERE (`idmotivo` = '$id')";

        if ($mysqli->query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);
            
            
        }
    }
    // --------------------------------------------------------------------------------------------------

   
}

<?php
class modeloCampania
{
    function agregarCampania($nombreCampania, $user)
    {
        require('../includes/conexion.php');

        $sql = "INSERT INTO `sucursal` (`nombre_sucursal`, `usercreacion_sucursal`) VALUES ('$nombreCampania', '$user');";

        if ($mysqli->query($sql)) {
            return true;
        } else {
            echo mysqli_error($mysqli);
        }
    }

    function mostrarCampania()
    {
        require('../includes/conexion.php');

        $sql = "SELECT idsucursal,nombre_sucursal FROM sucursal where estado_sucursal = 1";

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

   

    function borrarCampania($id,$user)
    {
        require('../includes/conexion.php');
        date_default_timezone_set('America/Guayaquil');
        $fechaBorar = strftime("%Y-%m-%d %H:%M:%S", time());

        $sql = "UPDATE `sucursal` SET `estado_sucursal` = '0',`userborrar_sucursal` = '$user',`fechaborrar_sucursal` = '$fechaBorar' WHERE (`idsucursal` = '$id')";

        if ($mysqli->query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);
            
            
        }
    }
    // --------------------------------------------------------------------------------------------------

   
}

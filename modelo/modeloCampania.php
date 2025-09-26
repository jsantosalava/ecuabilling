<?php
class modeloCampania
{
    function agregarCampania($nombreCampania, $user)
    {
        require('../includes/conexion.php');

        $sql = "INSERT INTO `campania` (`nombre_campania`, `usercreacion_campania`) VALUES ('$nombreCampania', '$user');";

        if ($mysqli->query($sql)) {
            return true;
        } else {
            echo mysqli_error($mysqli);
        }
    }

    function mostrarCampania()
    {
        require('../includes/conexion.php');

        $sql = "SELECT idcampania,nombre_campania FROM crm.campania where estado_campania = 1";

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

        $sql = "UPDATE `campania` SET `estado_campania` = '0',`userborrar_campania` = '$user',`fechaborra_campania` = '$fechaBorar' WHERE (`idcampania` = '$id')";

        if ($mysqli->query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);
            
            
        }
    }
    // --------------------------------------------------------------------------------------------------

   
}

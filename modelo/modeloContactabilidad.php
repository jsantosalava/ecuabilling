<?php
class modeloContactabilidad
{
    function agregarContactabilidad($campania, $nombreContactabilidad, $user)
    {
        require('../includes/conexion.php');

        $sql = "INSERT INTO `contactabilidad` (`nombre_contactabilidad`, `idcampania_contactabilidad`, `usercreacion_contactabilidad`) VALUES ('$nombreContactabilidad', '$campania', '$user');";

        if ($mysqli->query($sql)) {
            return true;
        } else {
            echo mysqli_error($mysqli);
        }
    }

    function mostrarContactabilidad()
    {
        require('../includes/conexion.php');

        $sql = "SELECT idcontactabilidad,nombre_contactabilidad,nombre_campania FROM contactabilidad left join campania on idcampania_contactabilidad = idcampania where estado_contactabilidad = 1";

        $resultado = $mysqli->query($sql);

        if ($resultado->num_rows > 0) {
            $a = 0;
            while ($fila = mysqli_fetch_array($resultado)) {
                $arreglobi[$a][0] = $fila[0];
                $arreglobi[$a][1] = $fila[1];
                $arreglobi[$a][2] = $fila[2];
     
                $a++;
            }
            return $arreglobi;
        } else {
            echo mysqli_error($mysqli);
        }
        
    }

   

    function borrarContactabilidad($id,$user)
    {
        require('../includes/conexion.php');
        date_default_timezone_set('America/Guayaquil');
        $fechaBorar = strftime("%Y-%m-%d %H:%M:%S", time());

        $sql = "UPDATE `contactabilidad` SET `estado_contactabilidad` = '0',`userborrar_contactabilidad` = '$user',`fechaborrar_contactabilidad` = '$fechaBorar' WHERE (`idcontactabilidad` = '$id')";

        if ($mysqli->query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);
            
            
        }
    }
    // --------------------------------------------------------------------------------------------------

   
}

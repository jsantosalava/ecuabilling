<?php
class modeloSegCalltype
{
    function agregarSegCalltype( $contactabilidad, $segcalltype,$user)
    {
        require('../includes/conexion.php');

        $sql = "INSERT INTO `segcalltype` (`nombre_segcalltype`, `idcontactabilidad_segcalltype`, `usercreacion_segcalltype`) VALUES ('$segcalltype', '$contactabilidad', '$user');";

        if ($mysqli->query($sql)) {
            return true;
        } else {
            echo mysqli_error($mysqli);
        }
    }

    function mostrarSegCalltype()
    {
        require('../includes/conexion.php');

        $sql = "SELECT idsegcalltype,nombre_segcalltype,nombre_contactabilidad FROM segcalltype left join contactabilidad on idcontactabilidad_segcalltype =  idcontactabilidad where estado_segcalltype = 1";

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

   

    function borrarSegCalltype($id,$user)
    {
        require('../includes/conexion.php');
        date_default_timezone_set('America/Guayaquil');
        $fechaBorar = strftime("%Y-%m-%d %H:%M:%S", time());

        $sql = "UPDATE `segcalltype` SET `estado_segcalltype` = '0',`userborra_segcalltype` = '$user',`fechaborrar_segcalltype` = '$fechaBorar' WHERE (`idsegcalltype` = '$id')";

        if ($mysqli->query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);
            
            
        }
    }
    // --------------------------------------------------------------------------------------------------

   
}
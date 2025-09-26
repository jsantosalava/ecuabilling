<?php
class modeloCalltype
{
    function guardarCalltype(  $segcalltype, $calltype,$user)
    {
        require('../includes/conexion.php');

        $sql = "INSERT INTO `calltype` (`nombre_calltype`, `idsegcalltype_calltype`, `usercreacion_calltype`) VALUES ('$calltype', '$segcalltype', '$user');";

        if ($mysqli->query($sql)) {
            return true;
        } else {
            echo mysqli_error($mysqli);
        }
    }

    function mostrarCalltype()
    {
        require('../includes/conexion.php');

        $sql = "SELECT idcalltype,nombre_calltype,nombre_segcalltype FROM calltype left join segcalltype on idsegcalltype_calltype = idsegcalltype where estado_calltype = 1;";

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

   

    function borrarCalltype($id,$user)
    {
        require('../includes/conexion.php');
        date_default_timezone_set('America/Guayaquil');
        $fechaBorar = strftime("%Y-%m-%d %H:%M:%S", time());

        $sql = "UPDATE `calltype` SET `estado_calltype` = '0',`userborrar_calltype` = '$user',`fechaborrar_calltype` = '$fechaBorar' WHERE (`idcalltype` = '$id')";

        if ($mysqli->query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);
            
            
        }
    }
    // --------------------------------------------------------------------------------------------------

   
}
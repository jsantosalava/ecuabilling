<?php
class modeloCampania
{
    function agregarCampania($nombreCampania,$tipo, $user)
    {
        require('../includes/conexion.php');

        $sql = "INSERT INTO `speech` (`tipo_speech`,`contenido_speech`, `usercreacion_speech`) VALUES ('$tipo','$nombreCampania', '$user');";

        if ($mysqli->query($sql)) {
            return true;
        } else {
            echo mysqli_error($mysqli);
        }
    }

    function mostrarCampania()
    {
        require('../includes/conexion.php');

        $sql = "SELECT tipo_speech,contenido_speech FROM speech where estado_speech = 1";

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

        $sql = "UPDATE `speech` SET `estado_speech` = '0',`userborrar_spech` = '$user',`fechaborrar_speech` = '$fechaBorar' WHERE (`idspeech` = '$id')";

        if ($mysqli->query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);
            
            
        }
    }
    // --------------------------------------------------------------------------------------------------

   
}

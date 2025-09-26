<?php
class modeloUsuario
{
    function agregarUsuario($nombreUsuario, $apellidoUsuario, $cedulaUsuario,$usuarioUs,
         $rolUsuario,$passUsuario,$user,$extension)
    {
        require('../includes/conexion.php');
        $hash=password_hash($passUsuario, PASSWORD_BCRYPT);
        $sql = "INSERT INTO `agente` (`nombre_agente`, `apellido_agente`, `cedula_agente`, `usuario_agente`, `pass_agente`, `rol_agente`, `usercreacion_agente`, `extension_agente`) VALUES ('$nombreUsuario', '$apellidoUsuario', '$cedulaUsuario', '$usuarioUs', '$hash', '$rolUsuario', '$user', '$extension');";

        if ($mysqli->query($sql)) {
            return true;
        } else {
            echo mysqli_error($mysqli);
        }
    }

    function mostrarUsuario()
    {
        require('../includes/conexion.php');

            $sql = "SELECT idagente,concat(nombre_agente,' ',apellido_agente) as nombres,cedula_agente,nombre_rol,extension_agente,usuario_agente FROM agente left join rol on rol_agente = idrol where estado_agente = 1";
       

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

        $sql = "SELECT nombre_agente,apellido_agente,cedula_agente,usuario_agente,pass_agente,rol_agente,extension_agente FROM agente where idagente = $id;";

        $resultado = $mysqli->query($sql);

        if ($resultado->num_rows > 0) {
            $fila=mysqli_fetch_assoc($resultado);
            
            return $fila;
        } else {
            echo mysqli_error($mysqli);
        }
        
    }


    function actualizarUsuario($id,$nombreUsuario, $apellidoUsuario, $cedulaUsuario,$usuarioUs,
         $rolUsuario,$passUsuario,$user,$extension)
    {
        require('../includes/conexion.php');
        date_default_timezone_set('America/Guayaquil');
        $fechaEdicion = strftime("%Y-%m-%d %H:%M:%S", time());
        $hash=password_hash($passUsuario, PASSWORD_BCRYPT);
        $sql = "UPDATE `agente` SET `nombre_agente` = '$nombreUsuario', `apellido_agente` = '$apellidoUsuario', `cedula_agente` = '$cedulaUsuario', `usuario_agente` = '$usuarioUs', `pass_agente` = '$hash', `rol_agente` = '$rolUsuario', `fechaeditar_agente` = '$fechaEdicion', `usereditar_agente` = '$user' WHERE (`idagente` = '$id');";

        if ($mysqli->query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);            
        }
    }

    function borrarUsuario($id,$user)
    {
        require('../includes/conexion.php');
        date_default_timezone_set('America/Guayaquil');
        $fechaBorar = strftime("%Y-%m-%d %H:%M:%S", time());

        $sql = "UPDATE `agente` SET `estado_agente` = '0',`userborrar_agente` = '$user',`fechaborrar_agente` = '$fechaBorar' WHERE (`idagente` = '$id')";

        if ($mysqli->query($sql)) {
            
            return true;
        } else {
            echo mysqli_error($mysqli);
            
            
        }
    }
}
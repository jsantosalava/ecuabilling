<?php
 class appmodelo {
    function ingresarUsuario( $usuario, $password ) {
        require ( '../includes/conexion.php' );
       
        
        $sql = "SELECT concat(nombre_agente,' ',apellido_agente) as nombre, rol_agente,idagente,pass_agente,usuario_agente,extension_agente
            from agente where usuario_agente = '$usuario' and estado_agente = 1 ";

            $resultado = $mysqli->query( $sql );
            if ( $resultado->num_rows > 0 ) {

                $resultado = $mysqli->query( $sql );
                $ver=mysqli_fetch_assoc($resultado);
                $hash = $ver['pass_agente'];

                if (password_verify($password, $hash)) {
                    session_start();
                    $_SESSION['INGRESO'] = 'YES';
                    $_SESSION['nombre'] = $ver['nombre'];
                    $_SESSION['rol'] = $ver['rol_agente'];
                    $_SESSION['user'] = $ver['idagente'];
                    $_SESSION['extension'] = $ver['extension_agente'];

                    $r = true;
                } else {
                    $r = false;
                }
        
            } else {
            $r = false;
            }
            return $r;

       
    }


 }
 ?>
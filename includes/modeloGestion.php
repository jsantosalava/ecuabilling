<?php
class modeloGestion
{
    function agregarGestion($tipo_llamada, $celularGestion, $campania,$contactabilidad,
         $segCalltype,$callType,$motivo,$fechaGestion,$calificacionGestion,$valorPagar,$tipoCliente,$evento,$comentario,$user,$cedCliente,$extension,$callid,$contratoGestion)
    {
        require('../includes/conexion.php');
        
        if($tipo_llamada == 2){
            $conn4 = new mysqli( "172.18.55.99", "comandato", "comandato123" );
            date_default_timezone_set( 'America/Guayaquil' );
            $fechaInicial = strftime( "%Y-%m-%d", time() );
            $fechaFinal = date( 'Y-m-d', strtotime( "$fechaInicial + 1 day" ) );
            $numero_SINCERO=preg_replace('/^0+/', '',$celularGestion);
            $sql1 = "SELECT recordingfile,duration FROM asteriskcdrdb.cdr where dst like '%$numero_SINCERO' and src = '$extension' and calldate between '$fechaInicial' and '$fechaFinal' order by calldate desc limit 1";
            $resultado_consulta_mysql4 = $conn4->query( $sql1 );

            while ( $row = mysqli_fetch_assoc( $resultado_consulta_mysql4 ) ) {
                $ruta = $row[ 'recordingfile' ];
                $duration = $row[ 'duration' ];
    
            }
            
        } elseif ($tipo_llamada == '1'){
             
            
        }

$conn4 = new mysqli( "192.168.12.229", "ecuasuena", "P@ssCh0c011688" );
            date_default_timezone_set( 'America/Guayaquil' );
            $fechaInicial = strftime( "%Y-%m-%d", time() );
            $fechaFinal = date( 'Y-m-d', strtotime( "$fechaInicial + 1 day" ) );

            $sql1 = "SELECT duration FROM call_center.calls WHERE id = '$callid'";
            $resultado_consulta_mysql4 = $conn4->query( $sql1 );

            while ( $row = mysqli_fetch_assoc( $resultado_consulta_mysql4 ) ) {
                $duration = $row[ 'duration' ];
            }
            
            $conn4 = new mysqli( "192.168.12.229", "ecuasuena", "P@ssCh0c011688" );
            
            $sql1 = "SELECT concat('/var/spool/asterisk/monitor/',recordingfile)as ruta FROM call_center.call_recording  where id_call_outgoing='$callid' order by datetime_entry desc limit 1";
            if($resultado_consulta_mysql4 = $conn4->query( $sql1 )){
                 $row = mysqli_fetch_assoc( $resultado_consulta_mysql4 ) ;
                $ruta ='si';

            }else {
            echo mysqli_error($mysqli);
        }

          
        $sql = "INSERT INTO `gestion_cliente` (`cedula_cliente`, `celular_gestion`, `campania_gestion`, `contactabilidad_gestion`, `segCalltype_gestion`, `calltype_gestion`, `motivoAtraso_gestion`, `fechaPago_gestion`, `calificacion_gestion`, `valorPago_gestion`, `tipocliente_gestion`, `evento_gestion`, `observacion_gestion`, `asesor_gestion`, `rutaAudio_gestion`, `tiempogestion_gestion`, `userCreacion_gestion`, `ManualPredictiva_gestion`,`contrato_cliente`) VALUES ('$cedCliente', '$celularGestion', '$campania', '$contactabilidad', '$segCalltype', '$callType', '$motivo', '$fechaGestion', '$calificacionGestion', '$valorPagar', '$tipoCliente', '$evento', '$comentario', '$extension', '$ruta', '$duration', '$user', '$tipo_llamada','$contratoGestion');";

        if ($mysqli->query($sql)) {
            return true;
        } else {
            echo mysqli_error($mysqli);
        }
    }

    function mostrarHistorial($id)
    {
        require('../includes/conexion.php');

            $sql = "
SELECT 
    CONCAT(nombre_agente, ' ', apellido_agente) AS asesor,
    fechaCreacion_gestion,
    celular_gestion,
    calificacion_gestion,
    observacion_gestion,
    nombre_segcalltype,
    nombre_calltype,
    fechaPago_gestion,
    
    contrato_cliente
FROM
    gestion_cliente
        LEFT JOIN
    agente ON asesor_gestion = extension_agente
    left join
    segcalltype on segCalltype_gestion = idsegcalltype
    left join
    calltype on calltype_gestion = idcalltype
WHERE
    estado_gestion = 1
        AND cedula_cliente = '$id';";
       

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

        $sql = "SELECT cedula_info,fecha_info,mes_info,nombre_info,correo_info,contrato_info,rango_info,director_info,gerente_info,supervisor_info,asesor_info,sucursal_info FROM crm.informacion_cliente where estado_info = 1 and cedula_info = '$id'";

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
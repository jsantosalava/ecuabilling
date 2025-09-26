<?php
class modeloReporteGestion
{

    function mostrarReporteGestion($fecha_inicio,$fecha_fin)
    {
        require('../includes/conexion.php');

            $sql = "SELECT 
    cedula_cliente,
    nombre_info,
    celular_gestion,
    nombre_campania,
    nombre_contactabilidad,
    nombre_segcalltype,
    nombre_calltype,
    nombre_motivo,
    fechaPago_gestion,
    calificacion_gestion,
    valorPago_gestion,
    tipocliente_gestion,
    evento_gestion,
    observacion_gestion,
    asesor_gestion,
    concat(nombre_agente,' ',apellido_agente) as nombre,
    tiempogestion_gestion,
    contrato_cliente,
    fechaCreacion_gestion
FROM
    gestion_cliente
        LEFT JOIN
    campania ON campania_gestion = idcampania
        LEFT JOIN
    contactabilidad ON contactabilidad_gestion = idcontactabilidad
        LEFT JOIN
    segcalltype ON segCalltype_gestion = idsegcalltype
        LEFT JOIN
    calltype ON calltype_gestion = idcalltype
        LEFT JOIN
    motivo ON motivoAtraso_gestion = idmotivo
        LEFT JOIN
    informacion_cliente ON cedula_cliente = cedula_info
    left join
    agente on asesor_gestion = extension_agente
WHERE
    fechaCreacion_gestion BETWEEN '$fecha_inicio' AND '$fecha_fin'";
       

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



}
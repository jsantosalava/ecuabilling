<?php
$connect = mysqli_connect("localhost","ecuasuena","P@ssCh0c011688","crm");
$connect -> set_charset( 'utf8' );
if(isset($_POST["cedula"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE `informacion_cliente` SET ".$_POST["column_name"]."= UPPER('".$value."') WHERE cedula_info = '".$_POST["cedula"]."' ";
 if(mysqli_query($connect, $query))
 {
  echo 'ACTUALIZADO';
 }
}
?>  


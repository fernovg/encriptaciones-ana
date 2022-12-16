<?php
include("conexion.php");
$id=$_GET['id'];
//generamos la consulta
$sql = "delete from aes_pago where id = '$id'";
mysqli_set_charset($con, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($con, $sql)){   
    echo '{"response":"0"}';
    die();
}
else
    echo '{"response":"1"}';
?>
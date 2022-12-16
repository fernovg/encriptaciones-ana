<?php

    define('METHOD','AES-256-CBC');
    define('SECRET_KEY','seguridad');
    define('SECRET_IV','101712');

include("conexion.php");


$nombre=$_POST['nom'];
$numero=$_POST['num'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$cvv=$_POST['cvv'];

$ecripnum=FALSE;
$key=hash('sha256', SECRET_KEY);
$iv=substr(hash('sha256', SECRET_IV), 0, 16);
$ecripnum=openssl_encrypt($numero, METHOD, $key, 0, $iv);
$ecripnum=base64_encode($ecripnum);

$ecripmes=FALSE;
$key=hash('sha256', SECRET_KEY);
$iv=substr(hash('sha256', SECRET_IV), 0, 16);
$ecripmes=openssl_encrypt($mes, METHOD, $key, 0, $iv);
$ecripmes=base64_encode($ecripmes);
            
$ecripano=FALSE;
$key=hash('sha256', SECRET_KEY);
$iv=substr(hash('sha256', SECRET_IV), 0, 16);
$ecripano=openssl_encrypt($ano, METHOD, $key, 0, $iv);
$ecripano=base64_encode($ecripano);

$ecripcvv=FALSE;
$key=hash('sha256', SECRET_KEY);
$iv=substr(hash('sha256', SECRET_IV), 0, 16);
$ecripcvv=openssl_encrypt($cvv, METHOD, $key, 0, $iv);
$ecripcvv=base64_encode($ecripcvv);


if(empty($_POST['nom'])||empty($_POST['num'])){
    echo '{"response":"0"}';
}
else{
    // $query = "INSERT INTO aes_pago (NombreTitular, NumTarjeta, Mes,Ano,CVV) 
    // VALUES ('$nombre', aes_encrypt('$numero','xyz123'),aes_encrypt('$mes','xyz123'),aes_encrypt('$ano','xyz123'),
    // aes_encrypt('$cvv','xyz123'));";
    $query = "INSERT INTO aes_pago (NombreTitular, NumTarjeta, Mes,Ano,CVV) 
    VALUES ('$nombre', '$ecripnum','$ecripmes','$ecripano','$ecripcvv');";
    
    $resultado = mysqli_query($con,$query);
    echo '{"response":"1"}';
}
    


?>
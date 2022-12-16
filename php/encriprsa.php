<?php
    include("conexion.php");

$nombre=$_POST['nom'];
$numero=$_POST['num'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$cvv=$_POST['cvv'];

//encriptaciones
    $key="fernando";


    $iv =  openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encryptednum = openssl_encrypt($numero,"aes-256-cbc",$key,0,$iv);
    $encryptedmes = openssl_encrypt($mes,"aes-256-cbc",$key,0,$iv);
    $encryptedano = openssl_encrypt($ano,"aes-256-cbc",$key,0,$iv);
    $encryptedcvv = openssl_encrypt($cvv,"aes-256-cbc",$key,0,$iv);

    $ennum = base64_encode($encryptednum."::".$iv);
    $enmes = base64_encode($encryptedmes."::".$iv);
    $enano = base64_encode($encryptedano."::".$iv);
    $encvv = base64_encode($encryptedcvv."::".$iv);

    if(empty($_POST['nom'])||empty($_POST['num'])){
        echo '{"response":"0"}';
    }
    else{
        // $query = "INSERT INTO aes_pago (NombreTitular, NumTarjeta, Mes,Ano,CVV) 
        // VALUES ('$nombre', aes_encrypt('$numero','xyz123'),aes_encrypt('$mes','xyz123'),aes_encrypt('$ano','xyz123'),
        // aes_encrypt('$cvv','xyz123'));";
        $query = "INSERT INTO rsa_tar (NombreTitular, NumTarjeta, Mes,Ano,CVV) 
        VALUES ('$nombre', '$ennum','$enmes','$enano','$encvv');";
        
        $resultado = mysqli_query($con,$query);
        echo '{"response":"1"}';
    }
?>
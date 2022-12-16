<?php
    include("php/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icon.png">
    <script src="js/aes.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Detalles Decifrado RSA</title>
</head>
<body>
<br><br>
<div class="container" style="display: flex;justify-content: center;">
    <div class="card" style="width: 18rem;">
    <div class="card-header bg-success">
            Detalles de tarjeta
        </div>
        <div class="card-body">
            <?php
            if (isset($_GET['id'])) {
                $idtar = mysqli_real_escape_string($con,$_GET['id']);
                $query = "select * from rsa_tar WHERE id='$idtar'";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    $tarjeta = mysqli_fetch_array($query_run);

                    $key="fernando";
                    list($encrypted_data,$iv) = explode('::',base64_decode($tarjeta['NumTarjeta']),2);
                    $desnum = openssl_decrypt($encrypted_data,'aes-256-cbc',$key,0,$iv);
                    list($encrypted_data,$iv) = explode('::',base64_decode($tarjeta['Mes']),2);
                    $desmes = openssl_decrypt($encrypted_data,'aes-256-cbc',$key,0,$iv);
                    list($encrypted_data,$iv) = explode('::',base64_decode($tarjeta['Ano']),2);
                    $desano = openssl_decrypt($encrypted_data,'aes-256-cbc',$key,0,$iv);
                    list($encrypted_data,$iv) = explode('::',base64_decode($tarjeta['CVV']),2);
                    $desCVV = openssl_decrypt($encrypted_data,'aes-256-cbc',$key,0,$iv);

                    ?>
                    <form action="" class="formulario">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nombre del titular</label>
                            <p type="text" class="form-control" id="nom" name="nom" value=""><?=$tarjeta['NombreTitular'];?></p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Numero de tarjeta</label>
                            <p type="text" class="form-control" id="num" name="num" value=""><?=$desnum;?></p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fecha</label>
                            <p type="text" class="form-control" id="mes" name="mes" value=""><?= $desmes.'/'.$desano; ?></p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">CVV</label>
                            <p type="text" class="form-control" id="cvv" name="cvv" ><?= $desCVV; ?></p>
                        </div>
                        
                    </form>
                    <?php
                }
            }
            ?>
            
        </div>
        <a href="rsa.php" class="btn btn-danger float-end">Regresar</a>
    </div>
</div>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>
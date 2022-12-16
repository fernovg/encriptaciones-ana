<?php
    include("php/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dis.css">
    <script src="js/aes.js"></script>
    <link rel="shortcut icon" href="icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Cifrado AES</title>
    <style>
        .credit-card-div  span { padding-top:10px; }
        .credit-card-div img { padding-top:30px; }
        .credit-card-div .small-font { font-size:9px; }
        .credit-card-div .pad-adjust { padding-top:10px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html">EL ANGELITO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link active" aria-current="page" href="#">Cifrado AES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rsa.php">Cifrado RSA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cifrado HASH v1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cifrado HASH v2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mio.html">Cifrado Propio</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<br><br>

<div class="container" style="display: flex;justify-content: center;">
    <div class="card">
        <div class="card-header bg-success">
            Datos de tarjeta
        </div>
        <div class="card-body">
            <form action="" id="formulario" method="post" class="credit-card-div">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row ">
                            <div class="col-md-12">
                                <input type="number" class="form-control" id="num" name="num" placeholder="Ingrese el número de tarjeta" />
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font" > Mes de vencimiento</span>
                                <input type="number" class="form-control" id="mes" name="mes" placeholder="MM" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font" >  Año de vencimiento</span>
                                <input type="number" class="form-control" id="ano" name="ano" placeholder="YY" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font" >  CCV</span>
                                <input type="number" class="form-control"id="cvv" name="cvv" placeholder="CCV" />
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">
                                <input type="text" class="form-control" name="nom" placeholder="Nombre del titular" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                        <input type="submit"  class="btn btn-danger" value="Cancelar" />
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                        <input type="submit" onclick="registrar()" class="btn btn-success btn-block" value="Comprar" />
                    </div>
                    </div>
                    <p class="card-text" style="font-size: 12px;">Datos Recabados Para pago de consultas o medicamentos</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<br><br>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body"> -->
                <table class="table_planes">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Numero Tarjeta</th>
                            <th>Fecha</th>
                            <th>CVV</th>
                            <th>Op</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $query="SELECT * FROM aes_pago";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run)>0) {
                            foreach($query_run as $tarjeta){
                                ?>
                                <tr>
                                    <td><?= $tarjeta['NombreTitular'] ?></td>
                                    <td><?= $tarjeta['NumTarjeta'] ?></td>
                                    <td><?= $tarjeta['Mes'].'<br>'.$tarjeta['Ano'] ?></td>
                                    <td><?= $tarjeta['CVV'] ?></td>
                                    <td>
                                        
                                        <a class="btn btn-warning"  href="ver_aes_des.php?id=<?= $tarjeta['id']; ?>"><i class="material-icons">remove_red_eye</i></a>
                                        <!-- <a class="btn btn-success" href="edit_aes.php?id=<?= $tarjeta['id']; ?>"><i class="material-icons">edit</i></a>                                         -->
                                        <a class="btn btn-danger" onclick="eliminarid( <?= $tarjeta['id']; ?> )"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Inicio</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Que es?</a></li>
        <li class="nav-item"><a href="Aviso_de_privacidad.html" class="nav-link px-2 text-muted">Aviso de privacidad</a></li>
      </ul>
      <p class="text-center text-muted">&copy; 2022 Crud Metodo de Pago, Inc</p>
    </footer>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>

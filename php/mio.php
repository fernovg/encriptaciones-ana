<?php
$va =['a','b','c','d','e','f','g','h','i','j','k','l','m',
'n','ñ','o','p','q','r','s','t','u','v','w','x','y','z'];

$vb =['a','b','c','d','e','f','g','h','i','j','k','l','m',
'n','ñ','o','p','q','r','s','t','u','v','w','x','y','z'];

$mensaje;
$t;
$cod = "";

$mensaje = $_POST['text'];
// $men = explode("",$mensaje);

// echo $men[0];

$str = $mensaje;

$arr1 = str_split($str);
$tam = strlen($arr1);

for ($x=0; $x < $tam ; $x++) { 
    for ($y=0; $y < strlen($va); $y++) { 
        if ($arr1[x]== $va[y]) {
            if ($y>23) {
                $cod = $cod+$va[($y-22)];
            }else{
                $cod=$cod+$vb[$y+4];
            } 
        }
    }
}

echo $cod
?>
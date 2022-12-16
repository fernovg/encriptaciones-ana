function encriptar(){
    var va =['a','b','c','d','e','f','g','h','i','j','k','l','m',
            'n','ñ','o','p','q','r','s','t','u','v','w','x','y','z'];

    var vb =['a','b','c','d','e','f','g','h','i','j','k','l','m',
            'n','ñ','o','p','q','r','s','t','u','v','w','x','y','z'];
    
    const mensaje = new FormData(document.getElementById('contra'));
    var t;
    var cod='';
    var men= mensaje.split(''); 
    for (let x = 0; x < men.length; x++) {
                    
        for (let y = 0; y < va.length; y++) {

            if (men[x]==va[y]) {
                console.log(y);
                if(y > 23){
                    cod = cod+va[(y-22)];
                    console.log(va);
                    
                }else{
                    cod=cod+vb[y+4];
                }                    
            
            }                                             
            
        } 
    }
    console.log(cod); 
}

function registrar(){
    const datos = new FormData(document.getElementById('formulario'));
    fetch("http://localhost/ana/php/mio.php",{method:'POST',body:datos})
    .then(respuesta=>respuesta.json())
    .then(registros=>{
        if(registros.response=='1'){
            alert("Registro agregado correctamente")
            //window.location = "./index.html";
        } 
        else
            alert("Datos incorrectos")
    }) 
}
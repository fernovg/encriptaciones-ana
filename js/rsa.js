function registrar(){
    const datos = new FormData(document.getElementById('formulario'));
    fetch("http://localhost/ana/php/encriprsa.php",{method:'POST',body:datos})
    .then(respuesta=>respuesta.json())
    .then(registros=>{
        if(registros.response=='1'){
            alert("Registro agregado correctamente");
            reload();
            // ver();
            // window.location = "../ana/aes.html";
        } 
        else
            alert("Campos Vacios");
            // ver();
    }) 
}

function eliminarid(id) {

    if (window.confirm("¿Quieres eliminar la tarjeta?")) {
        fetch("http://localhost/ana/php/del_rsa.php?id=" + id, { method: 'GET' })
            .then(respuesta => respuesta.json())
            .then(registros => {
                if (registros.response == '1'){
                    alert("Tarjeta eliminado correctamente");
                    location.reload();
                }
                    
                else
                    alert("algo anda mal")
            })
    }
}
$('#form').on('submit', function(event){

    event.preventDefault();

    let data = new FormData(this);

    //console.log(data.get('username'));
    //console.log(data.get('password'));

    $.ajax({
        url: "<?= route_to('save_login') ?>",
        type: "POST",
        data: data,
        pocessData: false,
        contentType: false,
        async: true,
        timeout: 10000,
        beforeSend: (xhr) =>{},
        success: (response) => {
            
            respuesta = JSON.parse(response);

            if(respuesta.status=="OK"){
                console.log("La petición ha ido correctamente");
            }else{
                console.log("La petición no ha ido bien");
            }

            
        },
        error: (xhr, status, error) => {
            alert("se ha producido un error");
        },
        complete: () => {}
    });
});
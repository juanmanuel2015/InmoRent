function actualizarReloj(){

    const ahora = new Date();

    const hora = ahora.toLocaleTimeString();

    const fecha = ahora.toLocaleDateString('es-AR',{

        weekday:'long',
        year:'numeric',
        month:'long',
        day:'numeric'

    });

    document.getElementById("reloj").innerHTML = hora;

    document.getElementById("fecha").innerHTML = fecha;

}

setInterval(actualizarReloj,1000);

actualizarReloj();
function eliminar(id,nombre, pag){
    if(window.confirm('¿Está seguro de que desea ELIMINAR:\n "'+nombre+'" de la tabla?\nPresione [Aceptar] para Confirmar')){
        window.location.href=pag+'?x='+id;
    }
}

function sel_todo(columna,n){
    let id = document.getElementById(columna+n);
    for(let i=1; i<=13;i++)
        document.getElementById(columna+i).checked=id.checked;
}
function maxSalida(sel,inp){
    let select= document.getElementById(sel).value;
    let option= document.getElementById('s'+select);
    let input= document.getElementById(inp);
    let btn = document.getElementById('btnSalida');
    if(select==0){
        btn.setAttribute('disabled',"");
        //input.setAttribute('disabled',"");
        input.removeAttribute('min');
        input.removeAttribute('max');
    }else{
    input.removeAttribute('disabled');
    btn.removeAttribute('disabled');
    option=option.getAttribute('name');
    input.setAttribute('min',1);
    input.setAttribute('max',option);
    }
    
}

function habilitar(sel,inp,clase){
    
    let select= document.getElementById(sel);
    let input= document.getElementById(inp);
    let btn = document.getElementById('btn-Entrada');
    if(select.value==0){
        btn.setAttribute('disabled',"");
        input.setAttribute('disabled',"");
    }
    else{
        input.removeAttribute('disabled');
        btn.removeAttribute('disabled');
    }
}


function salidaPDF(sel){
    let select= document.getElementById(sel).value;
    let btn = document.getElementById('btn-Pdf');
    if(select==0)
        btn.setAttribute('disabled',"");
    else
        btn.removeAttribute('disabled');
}
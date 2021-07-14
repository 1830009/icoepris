let contE=contS=contP=1;

function Agregar(div,sel,inp,vale){
    let divS= document.createElement('div');
    let elimS= document.createElement('i');
    let aS= document.createElement('a');
    let cuerpo= document.getElementById(div);
    let Select= document.getElementById(sel);
    let newSelect= Select.cloneNode(true);
    let enter= document.createElement('br');
    let enter1= document.createElement('br');
    let enter2= document.createElement('br');
    let enter3= document.createElement('br');
    let producto= document.createElement('label');
    let cantidad= document.createElement('label');
    let label_sol= document.createElement('label');
    let label_sur= document.createElement('label');
    let label_rec= document.createElement('label');
    let btn = document.getElementById('btn-Entrada');
    let surtida;
    let recibida;

    
    aS.setAttribute('id','btn-cerrar-popup');
    aS.setAttribute('class','btn-cerrar');
    elimS.setAttribute('class','fas fa-times');
    let aux= 'div-in'+contE;
    divS.setAttribute('id',aux);
    divS.setAttribute('class','flex2');
    aS.setAttribute('onclick','removeIn("'+aux+'","cuerpo")');
    producto.innerHTML='Producto: ';
    cantidad.innerHTML='&nbsp;Cantidad: ';
    label_sol.innerHTML='C Solicitada: ';
    label_sur.innerHTML='C Surtida: ';
    label_rec.innerHTML='C Recibida: ';
    newSelect.setAttribute('name','n-in'+contE);
    newSelect.setAttribute('id','sel'+contE);
    let input= document.getElementById(inp);
    let newInput= input.cloneNode(true);
    newInput.setAttribute('name','c-in'+contE);
    newInput.setAttribute('id','inp'+contE);
    newInput.value="";
    if (vale=='vale'){
        newInput.setAttribute('name','sol-in'+contE);
        newInput.setAttribute('id','sol-inp'+contE);

        surtida = input.cloneNode(true);
        recibida = input.cloneNode(true);

        surtida.setAttribute('name','sur-in'+contE);
        surtida.setAttribute('id','sur-inp'+contE);
        recibida.setAttribute('name','rec-in'+contE);
        recibida.setAttribute('id','rec-inp'+contE);

    }
    newSelect.setAttribute('onchange',"habilitar('sel"+contE+"','inp"+contE+"','sel-in')");
    btn.setAttribute('disabled',"");
    aS.appendChild(elimS);
    //divS.appendChild(enter);
    //divS.appendChild(enter1);
    if(vale=='vale'){
        btn.removeAttribute('disabled');
        let observacion= document.getElementById('obs').cloneNode(true);
        observacion.setAttribute('name','obs'+contE);
        divS.appendChild(aS);
        //divS.appendChild(enter3);
        divS.appendChild(producto);
        divS.appendChild(newSelect); 
        divS.appendChild(label_sol);
        divS.appendChild(newInput);    
        divS.appendChild(label_rec);
        divS.appendChild(surtida);
        divS.appendChild(label_sur);
        divS.appendChild(recibida);
        divS.appendChild(enter);
        divS.appendChild(observacion);
        divS.appendChild(enter1);
        divS.appendChild(enter2);
    }else{
        divS.appendChild(aS);
        divS.appendChild(producto);
        divS.appendChild(newSelect); 
        divS.appendChild(cantidad);
        divS.appendChild(newInput);
    }
    cuerpo.appendChild(divS);
    contE++;
}

function AgregarSld(div,sel,inp){
    //<a  id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times" ></i></a>
    let divS= document.createElement('div');
    let elimS= document.createElement('i');
    let aS= document.createElement('a');
    let cuerpo= document.getElementById(div);
    let Select= document.getElementById(sel);
    let newSelect= Select.cloneNode(true);
    let enter= document.createElement('br');
    let producto= document.createElement('label');
    let cantidad= document.createElement('label');
    let input= document.getElementById(inp);
    let newInput= input.cloneNode(true);
    let btn = document.getElementById('btnSalida');
    
    aS.setAttribute('id','btn-cerrar-popup');
    aS.setAttribute('class','btn-cerrar');
    elimS.setAttribute('class','fas fa-times');
    let aux= 'div-sld'+contS;
    divS.setAttribute('id',aux);
    aS.setAttribute('onclick','removeIn("'+aux+'","cuerpo1")')
    producto.innerHTML='Producto: ';
    cantidad.innerHTML='&nbsp;Cantidad: ';
    newSelect.setAttribute('name','n-sld'+contS);
    newSelect.setAttribute('id','selSalida'+contS);
    newSelect.setAttribute('onchange',"maxSalida('selSalida"+contS+"','inpSalida"+contS+"')");
    newInput.setAttribute('id','inpSalida'+contS);
    newInput.setAttribute('name','c-sld'+contS);
    //newInput.setAttribute('disabled','');
    newInput.value="";
    btn.setAttribute('disabled',"");
    
    aS.appendChild(elimS);
    //divS.appendChild(enter);
    divS.appendChild(aS);
    divS.appendChild(producto);
    divS.appendChild(newSelect); 
    divS.appendChild(cantidad);
    divS.appendChild(newInput);
    cuerpo.appendChild(divS);
    
    contS++;
}

function AgregarPDF(sel){
    //let contenedor= document.createElement('div');
    let divS= document.createElement('div');
    let elimS= document.createElement('i');
    let aS= document.createElement('a');
    let enter= document.createElement('br');
    let cuerpo= document.getElementById('div-pdf0');
    let Select= document.getElementById(sel);
    let producto= document.createElement('label');
    let newSelect= Select.cloneNode(true);
    let btn = document.getElementById('btn-Pdf');
    
    aS.setAttribute('id','btn-cerrar-popup');
    aS.setAttribute('class','btn-cerrar');
    elimS.setAttribute('class','fas fa-times');
    let aux= 'div-pdf'+contS;
    divS.setAttribute('id',aux);
    aS.setAttribute('onclick','removeIn("'+aux+'","div-pdf0")');
    producto.innerHTML='Producto: ';
    newSelect.setAttribute('name','n-pdf'+contP);
    newSelect.setAttribute('id','sel-pdf'+contP);
    newSelect.setAttribute('onchange',"salidaPDF('sel-pdf"+contP+"')");
    btn.setAttribute('disabled',"");
    aS.appendChild(elimS);
    divS.appendChild(enter);
    divS.appendChild(aS);
    divS.appendChild(producto);
    divS.appendChild(newSelect); 
    cuerpo.appendChild(divS);
    contP++;
}

function resetContE(){
    contE=1;
}
function resetContS(){
    contS=1;
}

function ValidarEntrada(){
    let i=0;
    for (i;i<contE;i++){
        if(document.getElementById('sel'+i).value==0){
            window.alert('Debes de Elegir un elemento de la lista\n y Recuerda Ingresar la cantidad...');
            return false;
        }
    }
    for(i=0;i<contE-1;i++){
        for (let j=i;j<contE;j++){
            if(document.getElementById('sel'+i).value==document.getElementById('sel'+(j+1)).value){
            let valor= $('select[id="sel'+i+'"] option:selected').text();
            window.alert('[USR-01] El producto: '+valor+" \nSolo puede ser agregado una vez, verifica de nuevo");
            return false;
        }
    }
}
return true;
}

function ValidarSalida(){
    let i=0;
    for (i;i<contS;i++){
        if(document.getElementById('selSalida'+i).value==0){
            window.alert('Debes de Elegir un elemento de la lista\n y Recuerda Ingresar la cantidad...');
            return false;
        }
    }
    for(i=0;i<contS-1;i++){
        for (let j=i;j<contS-1;j++){
            if(document.getElementById('selSalida'+i).value==document.getElementById('selSalida'+(j+1)).value){
                let valor= $('select[id="selSalida'+i+'"] option:selected').text();
                window.alert('[USR-01] El producto: '+valor+" \nSolo puede ser agregado una vez, verifica de nuevo");
                return false;
            }
        }
    }
    return true;
}

function ValidarPDF(){
    let i=0;
    for (i;i<contP;i++){
    try{
        if(document.getElementById('sel-pdf'+i).value==0){
            window.alert('Debes de Elegir un elemento de la lista\n y Recuerda Ingresar la cantidad...');
            return false;
        }
    }catch(error){}
    }
    for(i=0;i<contP-1;i++){
        for (let j=i;j<contP-1;j++){
        try{
            if(document.getElementById('sel-pdf'+i).value==document.getElementById('sel-pdf'+(j+1)).value){
                let valor= $('select[id="sel-pdf'+i+'"] option:selected').text();
                window.alert('[USR-01] El producto: '+valor+"\nSolo puede ser agregado una vez, verifica de nuevo");
                return false;
            }
        }catch(error){}
        }
    }
    return true;
}

function removeIn(id,div){
    let cuerpo= document.getElementById(div);
    let remover= document.getElementById(id);
    cuerpo.removeChild(remover);
}

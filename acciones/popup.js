
//----------------------ENTRADA-------------------------//
/*
var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
	overlay = document.getElementById('overlay'),
	popup = document.getElementById('popup'),
	btnCerrarPopup = document.getElementById('btn-cerrar-popup');

btnAbrirPopup.addEventListener('click', function(){
	overlay.classList.add('active');
	popup.classList.add('active');
});
**/
function abrir_entrada(){
	
	overlay = document.getElementById('overlay'),
	popup = document.getElementById('popup');

	overlay.classList.add('active');
	popup.classList.add('active');


}

function cerrar_entrada(){
	overlay = document.getElementById('overlay'),
	popup = document.getElementById('popup');
	//e.preventDefault();
	overlay.classList.remove('active');
	popup.classList.remove('active');
}


//----------------------SALIDA-------------------------//
function abrir_salida(){
	
	overlay = document.getElementById('overlay1'),
	popup = document.getElementById('popup1');

	overlay.classList.add('active');
	popup.classList.add('active');


}

function cerrar_salida(){
	overlay = document.getElementById('overlay1'),
	popup = document.getElementById('popup1');
	//e.preventDefault();
	overlay.classList.remove('active');
	popup.classList.remove('active');
}

//----------------------Producto Inventario-------------//
function abrir_pdf(){
	
	overlay = document.getElementById('overlay2'),
	popup = document.getElementById('popup2');

	overlay.classList.add('active');
	popup.classList.add('active');


}

function cerrar_pdf(){
	overlay = document.getElementById('overlay2'),
	popup = document.getElementById('popup2');
	//e.preventDefault();
	overlay.classList.remove('active');
	popup.classList.remove('active');
}


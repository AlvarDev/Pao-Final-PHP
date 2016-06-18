
var codusuGlobal = 0;
$( document ).ready(function() {
    setlayout();
});

function setlayout () {
	$('#profile-friends').css("display","none");
	$('#profile-search').css("display","none");
	$('#menu').css("display","none");
}

function iniciarSesion () {
	$('#login-register').css("display","none");
	$('#profile-friends').css("display","inline-block");
	$('#menu').css("display","inline-block");
}

function registrarusuario () {
	$('#login-register').css("display","none");
	$('#profile-friends').css("display","inline-block");
	$('#menu').css("display","inline-block");
}

function getProfile (codusu, codami, type) {
	console.log(codusu + " - "+codami+" - "+type);
}

function mostrarAmigos() {
	
}

function showMisAmigos () {
	$('#profile-friends').css("display","inline-block");
	$('#profile-search').css("display","none");
}

function showBuscar () {
	$('#profile-friends').css("display","none");
	$('#profile-search').css("display","inline-block");
}
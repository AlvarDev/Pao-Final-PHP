
var codusuGlobal = 0;
var url='http://192.168.0.31/Pao-Final-PHP/php/';
$( document ).ready(function() {
    setlayout();
});

function setlayout () {
	$('#profile-friends').css("display","none");
	$('#profile-search').css("display","none");
	$('#menu').css("display","none");
}

function iniciarSesion () {


	var dataReq = {
			"key"   : "User",
			"func"  : "loginUser",
			"email"  : $("#email").text(),
			"password"  : $("#password").text()
		};


	$.ajax({
         url:   'http://192.168.0.11/Pao-Final-PHP/php/',
         type:  'POST',
         dataType: "json",
         data: dataReq,
         success:  function (response) {
        	 if(response.success){
        	 	codusuGlobal = response.information.codusu;
        		$('#login-register').css("display","none");
				$('#profile-friends').css("display","inline-block");
				$('#menu').css("display","inline-block");
				//mostrarAmigos();

        	 }else{
        		 alert("Usuario no encontrado");  
        	 }
        	 
         
         },
		error: function(response){
			alert("Erro server");
		}
	
	});


	
}

function searchCallback (argument) {
	console.log("done");
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

	var dataReq = {
			"key"   : "User",
			"func"  : "loginUser",
			"codusu"  : codusuGlobal
		};
	$.ajax({
         url:   url,
         type:  'POST',
         dataType: "json",
         data: dataReq,
         success:  function (response) {
        	 if(response.success){

        	 	 $( ".amigo-row" ).remove();
        	 var html="";
        	 $.each(response.information, function(i, item) {


				html='<div class="amigo-row" onclick="getProfile('+codusuGlobal+','+item.codusu+',1)">';
				html+='<img class="photo-raw" src="'+item.foto+'" alt="Smiley face" ><br>';
				html+='<div class="data">'+item.nomusu+'</div><br>';
				html+='</div>';
        		 
        		 
        		 
        	 });
        	 $("#lista-amigos").append(html);

        	 }else{
        		 alert("No se encontraron amigos");  
        	 }
        	 
         
         },
		error: function(response){
			alert("Erro server");
		}
	
	});
	
}

function showMisAmigos () {
	$('#profile-friends').css("display","inline-block");
	$('#profile-search').css("display","none");
}

function showBuscar () {
	$('#profile-friends').css("display","none");
	$('#profile-search').css("display","inline-block");
}
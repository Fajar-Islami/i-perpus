$(document).ready(function() {  
 $("#akun-opt").hide();  
 $("#akun").click(function() {  
 if ($("#akun-opt").is(":visible"))   
 {  
  $("#akun").show();  
  $("#akun-opt").hide();  
 }  
 else   
 {  
 $("#akun").show();  
 $("#akun-opt").show();  
 }  
 });  
});  
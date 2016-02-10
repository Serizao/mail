$(document).ready(function() {










});




function preview_mail(uid){
	        $.get("function/readmail.php?uid="+uid+"", function(data, status){
	             $("#preview").html(data);
	        });
	   
	
}
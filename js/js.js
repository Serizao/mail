$(document).ready(function() {


interact('.resize-drag-x')

  .resizable({
    preserveAspectRatio: false,
    edges: { left: false, right: false, bottom: false, top: true }
  })
  .on('resizemove', function (event) {
    var target = event.target,
        x = (parseFloat(target.getAttribute('data-x')) || 0),
        y = (parseFloat(target.getAttribute('data-y')) || 0);

    // update the element's style
   
    target.style.height = event.rect.height + 'px';

    // translate when resizing from top or left edges
   
    y += event.deltaRect.top;

    target.style.webkitTransform = target.style.transform =
        'translate(' + x + 'px,' + y + 'px)';

    
    target.setAttribute('data-y', y);
  
  });

});




function preview_mail(uid){
			 $('#preview').css('display', 'block');
              var t = $("#liste-index-mail").scrollTop(); 
            	        $.get("readmail.php?uid="+uid+"", function(data, status){
	             $("#preview").html(data);
	        });
	         refresh_mail_view();


	   		$("#liste-index-mail").scrollTop(t);

	
}
function refresh_mail_view(){
	        $.get("function/function.php?do=refresh", function(data, status){
	             $("#list-mail").html(data);
	        });
	   
	
}
function flag(uid){
	        $.get("function/function.php?do=flag&uid="+uid+"", function(data, status){
	             
	        });
}
function close_preview(){
	$('#preview').css('display', 'none');
	$("#liste-index-mail").removeClass('half').addClass('full');
}
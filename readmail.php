 <?php   

 require_once('function/function.php');
if(isset($_REQUEST['uid']))
{

	$mail=new mail();

	$msg=$mail->read_mail($_REQUEST['uid']);
	if(isset($_REQUEST['action'])) 
	{
			echo '
                  
             
                      <div class="panel panel-default full">
                        <div class="panel-heading">
                          <h1 class="panel-title">'.utf8_decode(imap_utf8($msg[2])).'</h1> from '. $msg[1].'
                        </div>
                        <div class="panel-body mail_preview-b">';
						echo  quoted_printable_decode($msg[4]);
                        echo'
                     
                        </div>
                     
                
              </div>
          </div>
      </div>';




	}
	else
	{
			echo '
                  
                    
                      <div class="panel panel-default preview col-md-12">
                        <div class="panel-heading">  <div class="text-right" ><button onclick="close_preview()" type="button" class="btn btn-default"><span style="color:black" class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></div>
                          <h1 class="panel-title">'.utf8_decode(imap_utf8($msg[2])).'</h1> from '. $msg[1].'

                        </div>
                        <div class="panel-body mail_preview-b">';
						echo  quoted_printable_decode($msg[4]);
                        echo'
                     
                        
                      </div>
                </div>
            
          </div>
      </div>';




	}



}
else{
	echo 'error';
}







?>



   
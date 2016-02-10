 <?php   

 require_once('function.php');
if(isset($_REQUEST['uid']))
{

	$mail=new mail();
	$class="mail_preview";
	$msg=$mail->read_mail($_REQUEST['uid']);
	if(isset($_REQUEST['action'])) 
	{
			echo '
                  
             
                      <div class="panel panel-default">
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
                  
                    <div class="row">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h1 class="panel-title">'.utf8_decode(imap_utf8($msg[2])).'</h1> from '. $msg[1].'
                        </div>
                        <div class="panel-body mail_preview-b">';
						echo  quoted_printable_decode($msg[4]);
                        echo'
                     
                        </div>
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



   
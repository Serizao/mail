<?php




class mail
{

	public function __construct()
	{
		require_once('conf.php');
		$this->_mbox = imap_open("{".$host.":".$port."/novalidate-cert/tls}", $user, $password);
	}


	public function check_folder()
	{
		$folders = imap_listmailbox($mbox, "{webb.opensrc.fr:143}", "*");
		if ($folders == false) {
		   echo "Appel échoué<br />\n";
		} else {
		   foreach ($folders as $val) {
		       echo $val . "<br />\n";
		   }
		}
	}




	public function mail_check()
	{

		 $mails = FALSE;
		  if (FALSE === $this->_mbox) {
		      $err = 'La connexion a échoué. Vérifiez vos paramètres!';
		  } else {
		      $info = imap_check($this->_mbox);
		      if (FALSE !== $info) {
		          $nbMessages = min(50, $info->Nmsgs);
		          $mails = imap_fetch_overview($this->_mbox, '1:'.$nbMessages, 0);
		      } else {
		          $err = 'Impossible de lire le contenu de la boite mail';
		      }
		     
		  }

		  if (FALSE === $mails) {
		      echo $err;
		  } else {
		     echo '<div class="body half" id="liste-index-mail"><div class="col-md-12  tool-mail">
                <h3>
                  <a href="#" onclick="refresh_mail_view()"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
                  <a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                </h3>
              </div> <table class="table table-hover" ><thead><tr><th><input type="checkbox"></th> <th>Objet</th> <th>De</th> <th>Pour</th><th>date</th><th><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></th>  </tr> </thead> <tbody>';
		      foreach ($mails as $mail) {
		      	$infos = imap_headerinfo($this->_mbox, $mail->uid);
		      	$flag='<th onclick="flag(\''.$mail->uid.'\')"><span style="color:white;border:1px black solid" class="glyphicon glyphicon-flag" aria-hidden="true"></span></th>';
		      	if($infos->Flagged=="F") $flag='<td  onclick="flag(\''.$mail->uid.'\')"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></th>';
		      	if($infos->Unseen=="U")
			      	{		      		
			          echo '<tr><th><input type="checkbox" id="check'.$mail->uid.'"></th><th ondblclick="javascript:window.location.replace(\'index.php?action=readfullmail&uid='.$mail->uid.'\');" onclick="preview_mail(\''.$mail->uid.'\')">'.utf8_decode(imap_utf8($mail->subject)).'</th><th>'.$mail->from.'</th><th> '.utf8_decode(imap_utf8($mail->to)).'</th><th> '.$mail->date.'</th>'.$flag.'</tr>';
			      }
			      else
			      {
			      	echo '<tr><td><input type="checkbox" id="check'.$mail->uid.'"></td><td ondblclick="javascript:window.location.replace(\'index.php?action=readfullmail&uid='.$mail->uid.'\');" onclick="preview_mail(\''.$mail->uid.'\')">'.utf8_decode(imap_utf8($mail->subject)).'</td><td>'.$mail->from.'</td><td> '.utf8_decode(imap_utf8($mail->to)).'</td><td> '.$mail->date.'</td>'.$flag.'</tr>';
			      }
			       		      }
			       		      echo '
                           </tbody> </table></div>';

		     echo 'La boite aux lettres contient '.$info->Nmsgs.' message(s) <br />';
		     
		  }

	}

	public function read_mail($uid)
	{
		  if (FALSE === $this->_mbox) {
		      die('La connexion a échoué. Vérifiez vos paramètres!');
		  } else {
		      $test=imap_headers($this->_mbox);
		      $infos = imap_headerinfo($this->_mbox, $uid);
		      $headerText = imap_fetchHeader($this->_mbox, $uid, FT_UID);
		      $header = imap_rfc822_parse_headers($headerText);
		      // REM: Attention s'il y a plusieurs sections
		      $corps = imap_fetchbody($this->_mbox, $uid, 1, FT_UID);
		  }	
		  
		  imap_setflag_full($this->_mbox,$uid,"\\Seen");
		   $from=$header->from;
		  $msgglobal[]=$from[0]->personal;
		  $msgglobal[]=$from[0]->mailbox."@".$from[0]->host;
		  $msgglobal[]=$header->Subject;
		  $msgglobal[]=$header->date;
		  $msgglobal[]=$corps;
		  return $msgglobal;
	
	}

	public function flag($uid)
	{
		$test=imap_headers($this->_mbox);
		$infos = imap_headerinfo($this->_mbox, $uid);
		$headerText = imap_fetchHeader($this->_mbox, $uid, FT_UID);
		
		if($infos->Flagged=='F')
		{
			
			imap_clearflag_full($this->_mbox,$uid,"\\Flagged");
		}
		else
		{
			imap_setflag_full($this->_mbox,$uid,"\\Flagged");
		}

	}

}


if(isset($_REQUEST['do']) and !empty($_REQUEST['do']))
{
	if($_REQUEST['do']=="refresh") 
	{

		$m=new mail();
		return $m->mail_check();
	}
	if($_REQUEST['do']=="flag" and isset($_REQUEST['uid']) and !empty($_REQUEST['uid']))
	{

		$m=new mail();
		return $m->flag($_REQUEST['uid']);
	}


	
}
?>
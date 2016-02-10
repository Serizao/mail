<?php




class mail
{

	public function __construct()
	{
		$this->_mbox = imap_open("{webb.opensrc.Fr:143/novalidate-cert/tls}", "test.test@opensrc.fr", "jumglo1993");
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
		     
		      foreach ($mails as $mail) {
		          echo '<tr><td ondblclick="javascript:window.location.replace(\'index.php?action=readmail&uid='.$mail->uid.'\');" onclick="preview_mail(\''.$mail->uid.'\')">'.utf8_decode(imap_utf8($mail->subject)).'</td><td>'.$mail->from.'</td><td> '.utf8_decode(imap_utf8($mail->to)).'</td><td> '.$mail->date.'</td></tr>';
		      }
		     echo 'La boite aux lettres contient '.$info->Nmsgs.' message(s) <br />';
		  }

	}

	public function read_mail($uid)
	{
		  if (FALSE === $this->_mbox) {
		      die('La connexion a échoué. Vérifiez vos paramètres!');
		  } else {
		      
		      $headerText = imap_fetchHeader($this->_mbox, $uid, FT_UID);
		      $header = imap_rfc822_parse_headers($headerText);
		      // REM: Attention s'il y a plusieurs sections
		      $corps = imap_fetchbody($this->_mbox, $uid, 1, FT_UID);
		  }	
		   $from=$header->from;
		  $msgglobal[]=$from[0]->personal;
		  $msgglobal[]=$from[0]->mailbox."@".$from[0]->host;
		  $msgglobal[]=$header->Subject;
		  $msgglobal[]=$header->date;
		  $msgglobal[]=$corps;
		  return $msgglobal;
	
	}

}
	?>
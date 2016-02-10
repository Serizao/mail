<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/css.css" rel="stylesheet">
  </head>
  <body>

<!-- begin top menu  --> 
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12  top-men">
              <div class="text-right">
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></h3>
              </div>
            </div>
        </div>
      </div>
<!-- end top menu  --> 

      <div class="container-fluid">
          <div class="row">
          <!-- begin right menu  --> 
              <div class="col-md-2 left-men">
                <ul class="list-group">
                         <a class="list-group-item" href="#p"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Ecrire un nouveau message</a>
                      
                        <a  class="list-group-item" href="index.php"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>  Boite de réception</a>
                       
                        <a class="list-group-item" href="#"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>  Boite d'envoie</a>
                       
                       <a class="list-group-item" href="#"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span>  Messages supprimés</a>
                </ul>
              </div>
          <!-- end right menu  --> 
          <!-- begin body mail  --> 
              <div class="col-md-10 full">
                  
                  
                    <?php 
                    if(!empty($_REQUEST['action']) and (isset($_REQUEST['action'])))
                    {
                    require_once('function/'.$_REQUEST['action'].'.php');



                      }
                      else
                      {
                       echo '<div class="body"> <table class="table table-hover ><thead><tr> <th>Objet</th> <th>De</th> <th>Pour</th><th>date</th>  </tr> </thead> <tbody>';
                         require_once('function/function.php');
                          $mail=new mail();
                          $mail->mail_check(); 
                          echo '
                           </tbody> </table></div>
                          
                        
                        <div id="preview">
                        </div></div>';
                       
                      }
                    
           
                     
                    ?>
                    










    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
  </body>
</html>


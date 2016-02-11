<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/css.css" rel="stylesheet">
    <script src="js/interact.min.js"></script>
  </head>
  <body>

<!-- begin top menu  --> 
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12  top-men">
              <div class="text-right">
                <h3>
                  <a href="index.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a>
                  <a href="index.php?action=parametre"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                </h3>
              </div>
            </div>
        </div>
      </div>
<!-- end top menu  --> 

   
          <!-- end right menu  --> 
          <!-- begin body mail  --> 
              <div class="col-md-12 no-padding" >
                  
                  
                    <?php 
                    if(!empty($_REQUEST['action']) and (isset($_REQUEST['action'])))
                    {
                    require_once('function/'.$_REQUEST['action'].'.php');



                        
                      }
                      else
                      {
                        
                        include("include/mail-men.php");
                      
                         echo '<script>
                         $(document).ready(function() {
                          refresh_mail_view()


                         });

                         </script>
                          ';
              
                          echo '
            <div  id="list-mail"></div>
                        <div id="preview" class="half" >

                         <div class="panel panel-default preview">
                        <div class="panel-heading">
                         <div class="text-right" ><button onclick="close_preview()" type="button" class="btn btn-default"><span style="color:black" class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></div>
                        </div>
                        <div class="panel-body mail_preview-b">';
                          
                        echo'
                     
                        
                      </div>
                </div>
            
          </div>
      </div>
                        </div></div></div>';
                       
                      }
                    
           
                     
                    ?>
                    










    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/js.js"></script>
  </body>
</html>


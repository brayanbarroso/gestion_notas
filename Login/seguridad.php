<?php 
   session_start();

   if (isset($_SESSION['autenticado']) && ($_SESSION['autenticado']=true)) {
   
   }else{
   ?>
   <div class='alert alert-danger alert-dismissible' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <h3>Debe Iniciar Sesion para haceder a esta pagina</h3>
   </div>
   <meta http-equiv="refresh" content="2;url=../">
   <?php 
   	exit();
     
   }

   //$tiempo = time();

  // if ($tiempo > $_SESSION['expire']) {
   	//session_destroy();

   	
      //echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                  // <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                 // <h3>La sesion ha caducado</h3>
            //</div>";
      //echo '<meta http-equiv="refresh" content="2;url=../">'; 
      //exit();
  // }
 ?>
<?php  

 session_start();

?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="view/css/style.css">
  <!--<link rel="stylesheet" type="text/css" href="view/bootstrap/css/bootstrap.min.css"> -->
	<title>
		Escalando
	</title>
</head>
<body>
    
  <section>
  	<nav>
      <h1>ESCALAR</h1>
  		<?php  
           $enlaces = new navegacion();
           $enlaces -> nav_navegacion();
  		?>
  	</nav>

    

  <section>
  	
  	    <?php  
           $pagina = new navegacion();
           $pagina -> enlaces_control();
  		?>
  </section>

   <!-- <script type="text/javascript" src="view/bootstrap/js/bootstrap.min.js"></script>-->
   <script src="view/js/modal.js"></script>

</body>
</html>

	<section class="cont-form">
	   
	    <form method="post">
	    		<h2>Registro</h2>
	   		<div>
	   			<label for="">Nombre:</label>
	   			<input type="text" name="user_name">
	   		</div>
		   	<div>
		   		<label for="">Apellido:</label>
		   		<input type="text" name="user_ape">
		   	</div>
		   	<div class="cont-dat-ing">
		   		<label for="">Email:</label>
		   		<input type="text" name="user_email">
		   	</div>
		
		   	<div><button  name="registroUser">Registro</button></div>
	   	</form> 

	   	<?php 
	   	  $envioform = new usuariosControl();
	   	   $envioform -> registro_user_control();
	   	 ?>
	</section>

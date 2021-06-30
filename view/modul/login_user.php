
	<section class="cont-form">
		
		<form method="post">
			<h2>Ingreso</h2>
			<div class="cont-dat-ing">
				<label>Nombre:</label>
				<input type="text" name="nom">
			</div>
			<div>
				<label>Email:</label>
				<input type="text" name="email">	
			</div>
			
			<div>
				<button type="submit" name="ingresoUser">Ingresar</button>
			</div>
		</form>

		<?php  

          $ingreso = new usuariosControl();
          $ingreso -> ingreso_user_control();
		?>
	</section>

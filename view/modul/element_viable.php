<div class="eval-el">
		<form method="post" >

			<h3>Limite peso y calorias</h3>
			<div class="cont-dat-ing">
				<label>Peso maximo:</label>
				<input type="number" name="limpeso" step="0.01">

				<label>Calorias minimas:</label>
				<input type="number" name="limcalo" step="0.01">	

				<button type="submit" name="limitelem">Evaluar elementos viables</button>
			</div>

		</form>

</div>

<table border="1" class="t-seg">
		<thead>
			<tr>

				<th>Nombre</th>
				<th>peso</th>
				<th>calorias</th>
				


			</tr>
		</thead>
		<tbody>

			
			<?php  $elementos = new usuariosControl();
				$elementos -> viable_elemet_control();  
	        ?>
			
		</tbody>
</table>
<?php 


   
?>
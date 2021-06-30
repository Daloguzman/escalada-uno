
<?php  

if (isset($_SESSION["validarIngreso"])) {

	if ($_SESSION["validarIngreso"] != "ok") {

		echo '<script>
		window.location="index.php?pagina=element_registro";
		</script>';

	}
}else{

	echo '<script>
	window.location="index.php?pagina=login_user";
	</script>';
}

?>

<section class="form-lateral">

	<form method="post">
		<h2>Registrar elemento</h2>
		<div>
			<label for="">Elemento:</label>
			<input type="text" name="nomEle">
		</div>

		<div>
			<label for="">Peso:</label>
			<input type="number" name="pesoele" step="0.01">

			<select name="medipeso">
				<option value="select">select</option>
				<option value="mg">Miligramo</option>
				<option value="g">Gramo</option>
				<option value="kg">Kilogramo</option>
			</select>

		</div>

		<div>
			<label for="">Calorias:</label>
			<input type="text" name="canCal" class="inp3">
		</div>

		<button  class="btn-registro" name="regis_elem">Registrar</button>
	</form>

	<?php 

	$elementos = new usuariosControl();
	$elementos -> registro_elemet_control();
	?>
</section>



<section class="tabla-elemet">
	
	<button class="con-ele"><a href="index.php?pagina=element_viable">Consultar elementos viables</a></button>
    <h2 class="enu-tab">Elementos para escalada de risco</h2>
	<div class="cont-table">
		
		<table border="1" class="t-prin">
			<thead class="hea-ta">
				<tr>
					<th>Nombre</th>
					<th>Peso</th>
					<th>Unidad</th>
					<th>calorias</th>
					<th colspan="4">Acciones</th>

				</tr>
			</thead>
			<tbody class="">

				<?php 
				
				$elementos -> seleccionar_element_control(); 
				$elementos -> eliminar_registro_control(); ?>
			</tbody>
		

         </table>
	</div>

	<div class="cont-tabl_dos">

	<table border="1" class="t-seg">
		<thead>
			<tr>

				<th>Cantidad calorias</th>
				<th>total miligramos</th>
				<th>total gramos</th>
				<th>total Kilogramos</th>


			</tr>
		</thead>
		<tbody>

			<tr>
				<?php $elementos -> suma_peso_elemento(); ?>
			</tr>
		</tbody>
	</table>
</div>
	

  <div id="miModal" class="modal">
	  <div class="modal-contenido">
	    <a href="#" class="" title="Cerrar"><i class="fas fa-times-circle cerrar-modal"></i></a>
		    <?php 
           
            $elementos -> modificar_form_elemet_control();
            $elementos -> modificar_elemet_control();
	     ?>
	  </div>  
	</div>
</section>

    
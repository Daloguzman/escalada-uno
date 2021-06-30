<?php  

/**
* clase control de informacion de aplicativo
*/

include("model/userModel.php");

class usuariosControl
{
    /*=========================================================
    =            function para registro de usuario            =
    =========================================================*/
    public function registro_user_control(){
		if (isset($_POST['registroUser'])) {


			if ( $_POST['user_email'] != "" ) {

				$infoUser = array(
					"nameuser" => $_POST['user_name'],
					"apeser" => $_POST['user_ape'],
					"email" => $_POST['user_email']

				);


				$tabla="usuario";
				$envioinfouser = usuariosModel::registro_user_model($infoUser, $tabla);

				if ($envioinfouser == "exito") {

					echo "<span class='alert-corre '>Se completo el regisro</span>";

				}else{

					echo "<span class='alert-error dos-alert'>No se completo el regisro</span>";
				}

			}else{

				echo "<span class='alert-error dos-alert'>Se deben completar todos los campos</span>";
			}
		}

	}
    
   
    /*=====  End of function para registro de usuario  ======*/
    
    /*=============================================================
    =            funtion para el ingreso al aplicativo            =
    =============================================================*/
    static public function ingreso_user_control(){

		if (isset($_POST["ingresoUser"])) {

			if(!empty($_POST["nom"]) && !empty($_POST["email"]) ){


				$tabla="usuario ";

				$usu = array('usunom' =>$_POST["nom"] ,
					'usucor'=> $_POST["email"] );

				$usuario=usuariosModel::ingreso_user_model($usu,$tabla);

				if ($usuario["nom_usu"]==$_POST["nom"] && $usuario["cor_usu"]==$_POST["email"]) {

					$_SESSION["validarIngreso"] ="ok";
					$_SESSION["idusuarioini"] =$usuario["id_user"];



					echo ' 
					<script>


					if (window.history.replaceState) {

						window.history.replaceState(null,null, window.location.href);
					}

					window.location="index.php?pagina=element_registro";
					</script>
					';

				}else{

					echo ' 
					<script>


					if (window.history.replaceState) {

						window.history.replaceState(null,null, window.location.href);
					}
					</script>
					';






					echo '<div class="alert alert-danger">El usuario no se ha registrado</div>';
				}



			}


		}
	}
    
    
    /*=====  End of funtion para el ingreso al aplicativo  ======*/
    
	
	 
 

	

   /*==========================================================
   =            fnction para registro de elementos            =
   ==========================================================*/
   
	public function registro_elemet_control(){

		if (isset($_POST['regis_elem'])) {


			if ( $_POST['pesoele'] != "" &&  $_POST['medipeso'] != "select") {

				$infoUser = array(
					"nameele" => $_POST['nomEle'],
					"pesoel" => $_POST['pesoele'],
					"medpes" => $_POST['medipeso'],
					"calor" => $_POST['canCal'],
					"id_user" => $_SESSION["idusuarioini"]


				);


				$tabla="elemento";
				$envioinfoelem = usuariosModel::registro_element_model($infoUser, $tabla);

				if ($envioinfoelem == "exito") {

					echo "<span class='alert-corre'>Se completo el regisro</span>";

				}else{

					echo "No se completo el regisro";
				}

			}else{

				echo "<span class='alert-error dos-alert'>Debe completar todos los campos</span>";
			}
		}


	}
   
   
   /*=====  End of fnction para registro de elementos  ======*/
   

    /*=======================================================================
    =            funtion seleccionar elementos por id de usuario            =
    =======================================================================*/
    
	public function seleccionar_element_control(){

		if (isset($_SESSION["idusuarioini"])) {

			$tabla="elemento";
			$usuario=$_SESSION["idusuarioini"];

			$registros= usuariosModel::seleccionar_element_model($tabla,$usuario);



			foreach($registros as $registro ) {


				echo '
				<tr>
				<td>'.$registro["nom_elem"].'</td>
				<td>'.$registro["peso"].'</td>
				<td>'.$registro["unidPe"].'</td>
				<td>'.$registro["caloria"].'</td>
				<td>

				<a href="index.php?pagina=element_registro&id_act='.$registro["id_elem"].'#miModal" title="Editar"><i class="fas fa-edit"></i></a>

				<form method="post" class="form-eli">
				<input type="hidden" value="'.$registro["id_elem"].'" name="idEli">
				<button type="submit"  name="eliminarUsu" class="elimi-ele" title="Borrar"><i class="fas fa-trash-alt icon-uno"></i></button>
				</form>

				</td>

				</tr>';
			}
		}

	}
    
    
    /*=====  End of funtion seleccionar elementos por id de usuario  ======*/
    
    /*====================================================================
    =            functio suma de peso de elementos y calorias            =
    ====================================================================*/
    
    public function suma_peso_elemento(){


		$tabla="elemento";
		$miligramos = 0;
		$gramos = 0;
		$calorias = 0;
		$kilogramo = 0;
		$kilo=0;

		$datos =  usuariosModel::seleccionar_medida_model($tabla);
		foreach ($datos as $dato ) {

			switch ($dato["unidPe"]) {
				case 'mg':

				$miligramos= $miligramos + $dato["peso"];

				break;

				case 'g':

				$gramos = $gramos + $dato["peso"] ;

				break;

				case 'kg':

				$kilo = $kilo + $dato["peso"] ;

				break;

				default:
				echo "unidad no permitidad";
				break;
			}

			$calorias= $calorias + $dato["caloria"];



		}

		$miliagramo = $miligramos / 1000;
		$gramoakilo = $miliagramo /1000;
		$gramosakilo = $gramos / 1000;

		$kilogramo = $gramoakilo + $gramosakilo;
		$totalKilo= $kilogramo +$kilo;

		$totalKilo=number_format((float)$totalKilo, 2, '.', '');

		echo '  
		<td>'.$calorias.'</td>
		<td>'.$miligramos.'</td>
		<td>'.$gramos.'</td>
		<td>'.$totalKilo.'</td>
		';

	}
    
    /*=====  End of functio suma de peso de elementos y calorias  ======*/
    
	


   /*=================================================================
   =            funtion para borrar elementos registrados            =
   =================================================================*/
    public function eliminar_registro_control(){

		if (isset($_POST["eliminarUsu"])) {

			$tabla="elemento";
			$dato=$_POST["idEli"];
			$usuario=$_SESSION["idusuarioini"];

			$registro= usuariosModel::eliminar_registro_model($usuario,$dato,$tabla);

			if ($registro=="ok") {
				echo '<script>


				if (window.history.replaceState) {

					window.history.replaceState(null,null, window.location.href);
				}

				window.location="index.php?pagina=element_registro";
				</script>
				';
			}


		}

	}
   
   
   /*=====  End of funtion para borrar elementos registrados  ======*/
   
	
    /*====================================================================
    =            funtion paramostrar formulario modificar elementos registrados            =
    ====================================================================*/
    public function modificar_form_elemet_control(){

		if (isset($_GET['id_act'])) {

			$tabla="elemento";
			$dato=$_GET["id_act"];
			$usuario=$_SESSION["idusuarioini"];

			$registro = usuariosModel::seleccionar_elemento_model($usuario,$dato,$tabla);


			echo '<form method="post" class="form-modi">
			<h2>Modificar elemento</h2>
			<div>
			<label for="">Nombre :</label>
			<input type="text" name="nomEle" value="'.$registro["nom_elem"].'">
			</div>

			<div>
			<label for="">Peso :</label>
			<input type="number" name="pesoele" step="0.01"  value="'.$registro["peso"].'">

			<select name="medipeso">
			<option value="select">select</option>
			<option value="mg">Miligramo</option>
			<option value="g">Gramo</option>
			<option value="kg">Kilogramo</option>
			</select>
			</div>

			<div>
			<label for="">Calorias :</label>
			<input type="text" name="canCal" class="inp3"  value="'.$registro["caloria"].'">
			<input type="hidden" name="id_elem" value="'.$registro["id_elem"].'" >
			</div>

			<button  class="btn-modificar" name="modifi_elem">Modificar</button>
			</form>
			';

		}


	}
    
    
    /*=====  End of funtion para mostrar formulario elementos registrados  ======*/
    
	



    /*====================================================================
    =            funtion para modificar elementos registrados            =
    ====================================================================*/
    
    public function modificar_elemet_control(){

		if (isset($_POST['modifi_elem'])) {



			if ( $_POST['pesoele'] != "" &&  $_POST['medipeso'] != "select") {

				$infoUser = array(
					"nameele" => $_POST['nomEle'],
					"pesoel" => $_POST['pesoele'],
					"medpes" => $_POST['medipeso'],
					"calor" => $_POST['canCal'],
					"id_user" => $_SESSION["idusuarioini"],
					"id_elemnt" => $_POST["id_elem"]


				);


				$tabla="elemento";
				$envioinfoelem = usuariosModel::modificar_element_model($infoUser, $tabla);

				if ($envioinfoelem == "exito") {

					echo '<script>


					if (window.history.replaceState) {

						window.history.replaceState(null,null, window.location.href);
					}
					</script>';


					/*=====  End of escript para limpiar las variables post  ======*/



					echo ';




					<script>
					window.location="index.php?pagina=element_registro" 
					alert("El usuario se ha editado con exito")</script>

					';



				}else{

					echo "No se completo el regisro";
				}

			}else{

				echo "<span class='alert-error'>Se debe completar todos los campos</span>";
			}
		}


	}
    
    /*=====  End of funtion para modificar elementos registrados  ======*/
    
	


   /*=====================================================================================================
   =            functios para calcular peso y calorias segun limites establecidos por usuario            =
   =====================================================================================================*/
   public function viable_elemet_control(){

		if (isset($_POST['limitelem']) && $_POST['limpeso'] != "" &&  $_POST['limcalo'] != "") {

			$minimocaloria = $_POST['limcalo'];
			$limitepeso = $_POST['limpeso'];

			$usuario=$_SESSION["idusuarioini"];
			$tabla="elemento";

			$miligramos = 0;
			$gramos = 0;
			$calorias = 0;
			$kilogramo = 0;
			$totalKilo=0;
			$totalgramos=0;




			$datos= usuariosModel::seleccionar_element_model($tabla,$usuario);


			foreach ($datos as $dato ) {



				if ($limitepeso >= $dato["peso"]  &&  $dato["unidPe"] == "kg" &&  $minimocaloria <= $calorias) {

					$kilogramo = $kilogramo + $dato["peso"];

					$totalKilo =  $kilogramo;

					if ( $totalKilo <= $limitepeso   ) {


						echo '<tr>  
						<td>'.$dato["nom_elem"].'</td>
						<td>'.$dato["peso"]." ".$dato["unidPe"].'</td>
						<td>'.$dato["caloria"].'</td>

						</tr>
						';



					}

					$calorias= $calorias + $dato["caloria"];

				}

				if ($totalKilo <= $limitepeso && $dato["unidPe"] == "g" ) {

					$gramos = $gramos + $dato["peso"];

					$totalgramos = $gramos / 1000;


					$sumakiloagramo = $totalKilo + $totalgramos;
					$calorias= $calorias + $dato["caloria"];
					if ($sumakiloagramo <= $limitepeso &&  $minimocaloria <= $calorias ) {
						$totalKilo = $sumakiloagramo;
						echo '<tr>  
						<td>'.$dato["nom_elem"].'</td>
						<td>'.$dato["peso"]." ".$dato["unidPe"].'</td>
						<td>'.$dato["caloria"].'</td>

						</tr>
						';


					}



				}

				if($totalKilo <= $limitepeso && $dato["unidPe"] == "mg" &&  $minimocaloria <= $calorias ){

					$miligramos = $miligramos + $dato["peso"];

					$miligramos = $miligramos / 1000;

					$nuevomiligramo = $miligramos / 1000;
					$totalmiligramo =  $totalgramos + $nuevomiligramo;

					if ($totalmiligramo <= $limitepeso ) {
						$totalKilo = $totalmiligramo;
						echo '<tr>  
						<td>'.$dato["nom_elem"].'</td>
						<td>'.$dato["peso"]." ".$dato["unidPe"].'</td>
						<td>'.$dato["caloria"].'</td>

						</tr>
						';
						$calorias= $calorias + $dato["caloria"];
					}

				}


			}

			$totalKilo=number_format((float)$totalKilo, 2, '.', '');
			echo '
			<div class="cont-limit"> 
			<div> 
			<span> Total Peso Kilogramo:</span>	       
			'.$totalKilo.'
			</div>



			<div> <span> Maximo peso permitido:</span>	       
			'.$limitepeso.'</div>

			</div>

			<div class="cont-limit-ca">  
			<div><span> Total calorias</span>	       
			'.$calorias.'</div>


			<div><span> Minimo calorias permitidas</span>	       
			'.$minimocaloria.'</div>

			</div>

			';
		}


	}
   
   
   /*=====  End of functios para calcular peso y calorias segun limites establecidos por usuario  ======*/
}


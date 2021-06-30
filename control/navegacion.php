<?php 

    /**
	*  En esta clase manejamos todo lo referente a la navegacion dentro del aplicativo
	*/
	class navegacion 
	{
		
        /*==================================================================
        =            function para incluir plantilla en el index           =
        ==================================================================*/
        
	        public function inluir_plantilla(){

				include_once 'view/plantilla.php';
			}
        
        /*=====  End of function para incluir plantilla en el index  ======*/
        
		

        /*===================================================================================
        =            function para el control de enlaces de navegacion de la nav            =
        ===================================================================================*/

	        public function nav_navegacion(){

				
					if (isset($_SESSION["validarIngreso"])) {
						
						echo '
						      <a class="" href="index.php?pagina=salir"> Salir </a>
						     <a class="" href="index.php?pagina=inicio">Inicio</a>
				       	     ';

					}else{
						echo '<a class="" href="index.php?pagina=login_user">Ingreso</a>
					   <a class="" href="index.php?pagina=registro_user">Registro</a>
					';
					}
			}
        
        
        /*=====  End of function para el control de enlaces de navegacion de la nav  ======*/
        
		
        /*===========================================================
        =            function para la vista de paginas              =
        ===========================================================*/

	        public function enlaces_control()
			{
				if (isset($_GET["pagina"])) {
					

					if ($_GET["pagina"] == "login_user" || $_GET["pagina"] == "registro_user" ||  $_GET["pagina"] == "element_registro" || $_GET["pagina"] == "element_viable" || $_GET["pagina"] == "salir") { 
						
						include_once "view/modul/".$_GET["pagina"].".php";

					}else if ($_GET["pagina"] == "inicio") {
						include_once "view/modul/element_registro.php";
					}
				}
				else{
					include_once "view/modul/login_user.php";
				}
			}
        
        
        /*=====  End of function para la vista de paginas ======*/
        
	}
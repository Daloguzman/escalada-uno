<?php 
/**
 * clase para peticiones de informacion a base de datos
 */
require_once "conexion.php";

class usuariosModel extends CONEXION 
{
	
	/*=============================================
	=            Section function para registro de usuario            =
	=============================================*/
	static public function registro_user_model($infoUser,$tabla)
	{
		$crearUsuario = CONEXION::conectar() -> prepare("INSERT INTO $tabla(nom_usu,ape_usu,cor_usu) values (?,?,?)");
        
        $crearUsuario -> bindParam(1,$infoUser["nameuser"],PDO::PARAM_STR);
        $crearUsuario -> bindParam(2,$infoUser["apeser"],PDO::PARAM_STR);
        $crearUsuario -> bindParam(3,$infoUser["email"],PDO::PARAM_STR);
       

        $crearUsuario -> execute();

		if ($crearUsuario == TRUE) {

		   return "exito";
		
		}else{

			return print_r(Conexion::conectar()->errorInfo());
		}

		$crearUsuario -> close();

		$crearUsuario = null;
			
	}
	
	
	/*=====  End of Section function para registro de usuario  ======*/
	
	
    /*=====================================================
    =            funtion ingreso al aplicativo            =
    =====================================================*/
    static public function ingreso_user_model($datos,$tabla){

		$usuario = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nom_usu =? AND cor_usu=? ");

		$usuario -> bindPAram(1,$datos["usunom"],PDO::PARAM_STR);
		$usuario -> bindPAram(2,$datos["usucor"],PDO::PARAM_STR);


		if ($usuario -> execute()) {
			 return $usuario ->fetch();
			
		}else{

			return print_r(Conexion::conectar()->errorInfo());
		}

		$usuario -> close();

		$usuario = null;
	}
    
    
    /*=====  End of funtion ingreso al aplicativo  ======*/
    

	

   /*==========================================================
   =            funtion para registro de elementos            =
   ==========================================================*/
   static public function registro_element_model($infoElem,$tabla)
	{
		$crearelemento = CONEXION::conectar() -> prepare("INSERT INTO $tabla(nom_elem, peso, unidPe, caloria, id_user) values (?,?,?,?,?)");
        $crearelemento -> bindParam(1,$infoElem["nameele"],PDO::PARAM_STR);
        $crearelemento -> bindParam(2,$infoElem["pesoel"],PDO::PARAM_STR);
        $crearelemento -> bindParam(3,$infoElem["medpes"],PDO::PARAM_STR);
        $crearelemento -> bindParam(4,$infoElem["calor"],PDO::PARAM_STR);
        $crearelemento -> bindParam(5,$infoElem["id_user"],PDO::PARAM_STR);
       

        $crearelemento -> execute();

		if ($crearelemento == TRUE) {

		   return "exito";
		
		}else{

			return print_r(Conexion::conectar()->errorInfo());
		}

		$crearelemento -> close();

		$crearelemento = null;
			
	}
   
   
   /*=====  End of funtion para registro de elementos  ======*/
   
	

     /*=============================================
     =  Section funtion para seleccionar elementos por id    =
     =============================================*/
     static public function seleccionar_element_model($tabla,$usuario){

		$registros = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE elemento.id_user=?");
        $registros -> bindParam(1,$usuario,PDO::PARAM_STR);

		if ($registros -> execute()) {

			return $registros -> fetchAll();

		}else{

			return print_r(Conexion::conectar()->errorInfo());
		}

		$registros -> close();
		$registros = null;
	}

     
     
     /*=====  End of Sectionfuntion para seleccionar elementos por id  ======*/
     
	
	 /*=====================================================================
	 =            function para seleccionar todos los elementos            =
	 =====================================================================*/
	 
	   static public function seleccionar_medida_model($tabla){

		$registros = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $registros -> bindParam(1,$usuario,PDO::PARAM_STR);

		if ($registros -> execute()) {

			return $registros -> fetchAll();

		}else{

			return print_r(Conexion::conectar()->errorInfo());
		}

		$registros -> close();
		$registros = null;
	}
	 
	 /*=====  End of function para seleccionar todos los elementos  ======*/
	 

	

    /*=====================================================
    =            funtion para borrar registros            =
    =====================================================*/
    static public function eliminar_registro_model($usuario,$dato,$tabla){

		$registros = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE elemento.id_user =? AND elemento.id_elem=?");
		$registros -> bindParam(1,$usuario,PDO::PARAM_STR);
		$registros -> bindParam(2,$dato,PDO::PARAM_STR);

		if ($registros -> execute()) {

			return "ok";

		}else{

			return print_r(Conexion::conectar()->errorInfo());
		}

		$registros -> close();
		$registros = null;
	}
    
    
    /*=====  End of funtion para borrar registros  ======*/
    
	

    /*=================================================================
    =            funtion para seleccionar elementos unicos            =
    =================================================================*/
    static public function seleccionar_elemento_model($usuario,$dato,$tabla){

		$registros = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $tabla.id_user =? AND $tabla.id_elem=?");
		$registros -> bindParam(1,$usuario,PDO::PARAM_STR);
		$registros -> bindParam(2,$dato,PDO::PARAM_STR);

		if ($registros -> execute()) {

			return $registros -> fetch();

		}else{

			return print_r(Conexion::conectar()->errorInfo());
		}

		$registros -> close();
		$registros = null;
	}
    
    
    /*=====  End of funtion para seleccionar elementos unicos  ======*/
    
	

   /*========================================================================
   =            funtion para actualizar informacion de elementos            =
   ========================================================================*/
    static public function modificar_element_model($infoElem,$tabla)
	{
		$crearelemento = CONEXION::conectar() -> prepare("UPDATE $tabla SET nom_elem=?, peso=?, unidPe=?, caloria=? WHERE $tabla.id_user =? AND $tabla.id_elem=?");
        $crearelemento -> bindParam(1,$infoElem["nameele"],PDO::PARAM_STR);
        $crearelemento -> bindParam(2,$infoElem["pesoel"],PDO::PARAM_STR);
        $crearelemento -> bindParam(3,$infoElem["medpes"],PDO::PARAM_STR);
        $crearelemento -> bindParam(4,$infoElem["calor"],PDO::PARAM_STR);
        $crearelemento -> bindParam(5,$infoElem["id_user"],PDO::PARAM_STR);
        $crearelemento -> bindParam(6,$infoElem["id_elemnt"],PDO::PARAM_STR);
       
       

        $crearelemento -> execute();

		if ($crearelemento == TRUE) {

		   return "exito";
		
		}else{

			return print_r(Conexion::conectar()->errorInfo());
		}

		$crearelemento -> close();

		$crearelemento = null;
			
	}
   
   
   /*=====  End of funtion para actualizar informacion de elementos  ======*/
   
	

}
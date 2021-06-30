<?php  

/**
 * CLASE CONEXION A BASE DE DATOS
 */
class CONEXION 
{
	 /*=======================================================
	 =            function conexion base de datos            =
	 =======================================================*/
	 
	 static function conectar()
	 {
	 	$user='root';
	 	$pass='';
	 	$dbname='escalar';
	 	$host = 'localhost';

	 	try {

	 		$con = new pdo("mysql:host=$host;dbname=$dbname",$user,$pass);


	 		return $con;
	 		var_dump($con);

	 	} catch (Exception $e) {

	 		echo $e -> getMessage();
	 	}



	 }
	 
	 /*=====  End of function conexion base de datos  ======*/
	 
	

}


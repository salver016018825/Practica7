<?php
	echo "iniciar trasferencia de archivo";
	echo "INSERT INTO usuarios (id_usuario, nombre_usuario, foto) VALUES (NULL, 'Salvador', 'sal.jpg')";
	echo "</br>";
	
	$servername = "localhost";
	$username = "root";
	$pass = "";
	$database = "usuarios";
	
	$conexion = mysqli_connect($servername,$username,$pass,$database);
	
	//iniciar la transferencia del archivo
	//1. validar si se presiono un submit con un formulario
	if(ISSET($_POST["submit"])){
		echo "<br> se presioneo un boton submit en un formulario POST </br>";
		//parametro uno nombre del borron que sube archivo
		//parametro dos el nombre temporal
		$archivoOrigen = $_FILES["fileToUpload"]["tmp_name"];
		$archivoDestino = $_FILES["fileToUpload"]["name"];
		echo"el archivo transferido es ".$archivoDestino;
		echo"</br>";
		
		//parte 2 variable que estraiga la extencio ¿n del archivo
		$imageFileType = pathinfo($archivoDestino,PATHINFO_EXTENSION);
		
		echo"el extencion del archivo es ".$imageFileType."</br>";
		
		$check = getimagesize($archivoOrigen);
		
		if($check){
			echo"el archivo es una imagen </br>";
			//trasferencia al servidor
			move_uploaded_file($archivoOrigen,$archivoDestino);
			$query = "INSERT INTO usuarios (id_usuario, nombre_usuario, foto) values(null,'BD','".$archivoDestino."')";
			echo"el query a ejecutar es".$query;
			echo"</br>";
			$query_a_ejecutar=mysqli_query($conexion,$query);
			if($query_a_ejecutar){
				echo"ejecutando query</br>";
				header("Refresh:5;http://localhost/practica7/Formulario_archivo.html");
			}else{
				echo"Query no ejecutando</br>";
			}
		}else{
			echo"el archivo no es una imagen</br>";			
		}
		
		
		
	}
?>

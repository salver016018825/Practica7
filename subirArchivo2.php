<?php
	$servername = "localhost";
	$username = "root";
	$pass = "";
	$database = "usuarios";
	
	$info = array('Database'=>$baseDatos, 'UID'=>$usuario,'PWD'=>$pass);
	$conexion = sqlsrv_connect($servidor,$info);
	
	if(isset($_POST["submit"])){
	
	
	}
<?php
	$host="127.0.0.1";
	$port=3307;
	$socket="";
	$user="root";
	$password="";
	$dbname="transporte_publico";

	$conexion = new mysqli($host, $user, $password, $dbname, $port, $socket);
	/*or die ('Could not connect to the database server' . mysqli_connect_error());*/



	if (!$conexion) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
	else{
		//echo "Conectado";
	}

	//mysqli_close($conexion);
?>
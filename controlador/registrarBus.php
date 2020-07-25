<!DOCTYPE html>
<html>
<head>
	<title>Buses</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

</body>
</html>
<?php 
	if (isset($_POST["registrar"])) {
			require_once '../modelo/conexion.php';

			$nombre=$_POST["nombre"];
			$placa=$_POST["placa"];
			$modelo=$_POST["modelo"];
			$conductor=$_POST["conductor"];
			

			$sql= "INSERT INTO bus() VALUES (null,'".$nombre."','".$placa."','".$modelo."','".$conductor."')";
				if (mysqli_query($conexion,$sql)) {
					echo'<script type="text/javascript">
				    swal("Registro Completado","Cambios guardados correctamente","success",{
						buttons:[,"volver"],
				    }).then((value)=>{
						window.location.href="../vista/bus.php"});
				   		    
				    </script>';
				}
				else{
					echo '<script type="text/javascript">
				    swal("Error al registrar","No se ha podido guardar la información","error",{
				    	buttons: [,"volver"],
				    }).then((value)=>{

						window.location.href="../vista/bus.php"});
				    	
				    </script>';
				}
	}
?>
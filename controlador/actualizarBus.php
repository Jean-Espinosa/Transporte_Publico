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
	if (isset($_POST["actualizar"])) {
			require_once '../modelo/conexion.php';

			$Id=$_POST["Id"];
			$nombre=$_POST["nombre"];
			$placa=$_POST["placa"];
			$modelo=$_POST["modelo"];
			$conductor=$_POST["conductor"];
			

			$sql= "UPDATE bus SET Nombre='".$nombre."', Placa='".$placa."', Modelo='".$modelo."', Conductor_asignado='".$conductor."' WHERE Id='".$Id."'";
				if (mysqli_query($conexion,$sql)) {
					echo'<script type="text/javascript">
				    swal("Datos actualizados","Cambios guardados correctamente","success",{
						buttons:[,"volver"],
				    }).then((value)=>{
						window.location.href="../vista/bus.php"});
				   		    
				    </script>';
				}
				else{
					echo '<script type="text/javascript">
				    swal("Error de actualización","No se ha podido actualizar la información","error",{
				    	buttons: [,"volver"],
				    }).then((value)=>{

						window.location.href="../vista/bus.php"});
				    	
				    </script>';
				}
	}
?>
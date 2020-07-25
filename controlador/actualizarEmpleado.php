<!DOCTYPE html>
<html>
<head>
	<title>Empleados</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

</body>
</html>
<?php 
	if (isset($_POST["actualizar"])) {
			require_once '../modelo/conexion.php';

			$Id=$_POST["Id"];
			$documento=$_POST["documento"];
			$nombre=$_POST["nombre"];
			$apellido=$_POST["apellido"];
			$telefono=$_POST["telefono"];
			$direccion=$_POST["direccion"];
			

			$sql= "UPDATE empleado SET Documento='".$documento."',Nombre='".$nombre."', Apellido='".$apellido."', Telefono='".$telefono."', Direccion='".$direccion."' WHERE Id='".$Id."'";
				if (mysqli_query($conexion,$sql)) {
					echo'<script type="text/javascript">
				    swal("Datos actualizados","Cambios guardados correctamente","success",{
						buttons:[,"Continuar"],
				    }).then((value)=>{
						window.location.href="../vista/empleado.php"});
				   		    
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
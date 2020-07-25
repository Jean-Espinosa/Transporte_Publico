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
	if (isset($_POST["registrar"])) {
			require_once '../modelo/conexion.php';

			$documento=$_POST["documento"];
			$nombre=$_POST["nombre"];
			$apellido=$_POST["apellido"];
			$telefono=$_POST["telefono"];
			$direccion=$_POST["direccion"];
			

			$sql= "INSERT INTO empleado() VALUES (null,'".$documento."','".$nombre."','".$apellido."','".$telefono."','".$direccion."')";
				if (mysqli_query($conexion,$sql)) {
					echo'<script type="text/javascript">
				    swal("Registro Completado","Cambios guardados correctamente","success",{
						buttons:[,"Continuar"],
				    }).then((value)=>{
						window.location.href="../vista/empleado.php"});
				   		    
				    </script>';
				}
				else{
					echo '<script type="text/javascript">
				    swal("Error al registrar","No se ha podido guardar la información","error",{
				    	buttons: [,"volver"],
				    }).then((value)=>{

						window.location.href="../vista/empleado.php"});
				    	
				    </script>';
				}
	}
?>
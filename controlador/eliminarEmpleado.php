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
	
			require_once '../modelo/conexion.php';

			$Id = base64_decode($_GET["Id"]);
			
			

			$sql= "DELETE FROM empleado WHERE Id='".$Id."'";
				if (mysqli_query($conexion,$sql)) {
					echo'<script type="text/javascript">
				    swal("Registro Eliminado","Cambios guardados correctamente","success",{
						buttons:[,"Continuar"],
				    }).then((value)=>{
						window.location.href="../vista/empleado.php"});
				   		    
				    </script>';
				}
				else{
					echo '<script type="text/javascript">
				    swal("Error al eliminar","No se ha podido actualizar la información","error",{
				    	buttons: [,"Volver"],
				    }).then((value)=>{

						window.location.href="../vista/empleado.php"});
				    	
				    </script>';
				}
	
?>
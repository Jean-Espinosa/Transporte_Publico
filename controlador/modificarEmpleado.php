<?php 
	require_once '../modelo/conexion.php';
	$Id = base64_decode($_GET["Id"]);
	$empleados=mysqli_query($conexion,"SELECT * FROM empleado where Id={$Id}");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Empleados</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<!--<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/superhero/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<form method="post" action="actualizarEmpleado.php">
<?php

if (!$_GET) {
	echo'<script type="text/javascript">
		    swal("Error de conexion","No se pudo enviar los datos correctamente","error",{
				buttons:[,"volver"],
		    }).then((value)=>{
				window.location.href="../vista/empleado.php"});
				   		    
		</script>';
}
	foreach ($empleados as $empleado):
?>
<div class="container">
	<div class="form-group">
		<input type="hidden" name="Id" value="<?php echo $Id; ?>" readonly=true class="form-control">
	</div>
	<div class="form-group">
		<label>Documento</label><br>	
		<input type="text" class="form-control" placeholder="<?php echo $empleado["Documento"]?> " name="documento" maxlength="15" pattern="[0-9]{1,15}" autocomplete="off" required>
	</div>								
	<div class="form-group">
		<label>Nombre</label><br>	
		<input type="text" class="form-control" placeholder="<?php echo $empleado["Nombre"]?> " name="nombre" maxlength="30" pattern="[A-Za-z ]{1,30}" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label>Apellido</label><br>	
		<input type="text" class="form-control" placeholder="<?php echo $empleado["Apellido"]?> " name="apellido" maxlength="7" pattern="[A-Za-z ]{1,30}" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label>Telefono</label><br>	
		<input type="text" class="form-control" placeholder="<?php echo $empleado["Telefono"]?> " name="telefono" maxlength="15" pattern="[0-9]{1,15}" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label>Dirección</label><br>	
		<input type="text" class="form-control" placeholder="<?php echo $empleado["Direccion"]?> " name="direccion" maxlength="60" autocomplete="off" required>
	</div>

<?php endforeach ?>
	<div class="" style="margin-top: 5%;">
		<input type="reset" value="Cancelar" class="btn btn-danger" class="btn btn-danger" onclick="javascript:window.history.back()">
		<input type="submit" name="actualizar" value="Actualizar" class="btn btn-primary">
	</div>
</div>	
</form>
	
</body>
</html>
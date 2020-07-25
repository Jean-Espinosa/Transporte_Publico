<?php 
	require_once '../modelo/conexion.php';
	$Id = base64_decode($_GET["Id"]);
	$buses=mysqli_query($conexion,"SELECT * FROM bus where Id={$Id}");
	$conductores=mysqli_query($conexion,"SELECT e.Id,e.Nombre,e.Apellido FROM empleado e INNER JOIN usuario u ON e.Id=u.Empleado AND u.Cargo='Conductor'");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Buses</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<!--<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/superhero/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<form method="post" action="actualizarBus.php">
<?php

if (!$_GET) {
	echo'<script type="text/javascript">
		    swal("Error de conexion","No se pudo enviar los datos correctamente","error",{
				buttons:[,"volver"],
		    }).then((value)=>{
				window.location.href="../vista/bus.php"});
				   		    
		</script>';
}
	foreach ($buses as $bus):
?>
<div class="container">
	<div class="form-group">
		<label>ID</label>
		<input type="text" name="Id" value="<?php echo $Id; ?>" readonly=true class="form-control">
	</div>
	<div class="form-group">
		<label>Nombre</label><br>	
		<input type="text" class="form-control col-sm-8" name="nombre" placeholder="<?php echo $bus['Nombre'] ?>" maxlength="30" pattern="[A-Za-z ]{1,30}" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label>Placa</label><br>	
		<input type="text" class="form-control col-sm-8" placeholder="<?php echo $bus['Placa']; ?> " name="placa" maxlength="7" pattern="[A-Za-z0-9 ]{1,7}" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label>Modelo</label><br>	
		<input type="text" class="form-control col-sm-8" name="modelo" placeholder="<?php echo $bus['Modelo'] ?> " maxlength="6" pattern="[0-9]{1,6}" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label>Conductor asignado</label><br>	
		<select class="form-control col-sm-8" name="conductor">
			<?php 
				$asignados=mysqli_query($conexion,"SELECT e.Nombre,e.Apellido FROM bus b INNER JOIN (empleado e INNER JOIN usuario u ON e.Id=u.Empleado AND u.Cargo='Conductor') ON b.Conductor_asignado= e.Id AND b.Id={$Id}");

				foreach ($asignados as $asignado) {
					
					echo '<optgroup label="'.$asignado["Nombre"].' '.$asignado["Apellido"].'">';
				}
				foreach ($conductores as $conductor) {
					echo "<option value='".$conductor["Id"]."'>".$conductor["Nombre"]." ".$conductor["Apellido"]."</option>";
				}
			?>
		</select>
		<?php 
		
		?>
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
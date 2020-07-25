<?php 
	require_once '../modelo/conexion.php';
	$buses=mysqli_query($conexion,"SELECT * FROM bus");
	$conductores=mysqli_query($conexion,"SELECT e.Id,e.Nombre,e.Apellido FROM empleado e INNER JOIN usuario u ON e.Id=u.Empleado AND u.Cargo='Conductor'");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Buses</title>
	
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<!--<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/superhero/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bus/set.css">

</head>
<body>
	<div class="header">
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>                        
		      </button>
		      <a class="navbar-brand emp">Transporte Público</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav">
		        <li><a href="../index.php"><i class="fas fa-home"></i> Inicio</a></li>
		        
		        <li><a href="empleado.php"><i class="fas fa-user-circle"></i> Empleados</a></li>
		        <li><a href="#"><i class="fas fa-users"></i> Usuarios</a></li>
		        <li><a href="#"><i class="fas fa-clipboard"></i> Contratos</a></li>
		        <li class="active"><a href="bus.php"><i class="fas fa-bus"></i> Buses</a></li>
		        <li><a href="#"><i class="fas fa-road"></i> Rutas</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesión</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>

	<div class="col-sm-12">
		<div class="container col-sm-12">
			<div class="dd col-sm-12">
				<center>
					<h1>Registrar</h1>
					<!-- Trigger the modal with a button -->
					<button type="button" class="reg btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Registrar</button>
				</center>
					<!-- Modal -->
					<div id="myModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h1 class="modal-title">Registrar</h1>
					      </div>
					      <div class="modal-body">
					        <form method="post" action="../controlador/registrarBus.php">
								<div class="container col-sm-12">									
									<div class="col-sm-12">
										<label>Nombre</label><br>	
										<input type="text" class="list-group-item col-sm-8" name="nombre" maxlength="30" pattern="[A-Za-z ]{1,30}" autocomplete="off" required>
									</div>
									<div class="col-sm-12">
										<label>Placa</label><br>	
										<input type="text" class="list-group-item col-sm-8" name="placa" maxlength="7" pattern="[A-Za-z0-9 ]{1,7}" autocomplete="off" required>
									</div>
									<div class="col-sm-12">
										<label>Modelo</label><br>	
										<input type="text" class="list-group-item col-sm-8" name="modelo" maxlength="6" pattern="[0-9]{1,6}" autocomplete="off" required>
									</div>
									<div class="col-sm-12">
										<label>Conductor asignado</label><br>	
										<select class="list-group-item col-sm-8" name="conductor">
											<?php 
												foreach ($conductores as $conductor) {
													echo "<option value='".$conductor["Id"]."'>".$conductor["Nombre"]." ".$conductor["Apellido"]."</option>";
												}
											?>
										</select>
									</div>
									
									
								</div>
							
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					        <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
					        </form>
					      </div>
					    </div>

					  </div>
					</div>
				
			</div>
		</div>	
				<table class="table">
				    <thead>
				        	<tr>
				          		<th>Nombre</th>
				          		<th>Placa</th>
				          		<th>Modelo</th>
				          		<th>Conductor Asignado</th>
				          		<th colspan="2">Opciones</th>
				          	</tr>
				    </thead>
				        <?php 
				          	foreach ($buses as $bus){
				          	echo "<tr><td>".$bus["Nombre"]."</td>
				          	<td>".$bus["Placa"]."</td>
				          	<td>".$bus["Modelo"]."</td>
				          	<td>";
				          	$asignar=mysqli_query($conexion,"SELECT e.Nombre,e.Apellido FROM empleado e INNER JOIN usuario u ON e.Id=u.Empleado AND u.Cargo='Conductor' AND e.Id=".$bus["Conductor_asignado"]." ");
				          	$cadena="{$bus["Id"]}";
				          	$urlEliminar= base64_encode($cadena);
				          	$urlActualizar= base64_encode($cadena);
				          	foreach ($asignar as $asigna) {
				          		echo $asigna["Nombre"]." ".$asigna["Apellido"];
				          	}
				          	echo "</td>
				    		<td><a class='btn btn-warning add_actualiza' href='../controlador/modificarBus.php?Id={$urlActualizar}'>Actualizar</a></td>
				    		<td><a href='../controlador/eliminarBus.php?Id=".$urlEliminar."' onclick='return confirmar()'  class='btn btn-danger'>Eliminar</a></td></tr>";

				        	}	
				      	?>
			    </table>
		
		
	</div>
	<script type="text/javascript">
		function confirmar(){
			return confirm('Desea realizar esta operación?');
		}
	</script>
</body>
</html>
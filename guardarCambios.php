<?php
	if(!empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Apellido2']) && !empty($_POST['Edad']) && !empty($_POST['TipoSangre']) && !empty($_POST['Alergias'])){

		if($_POST['TipoSangre'] != 'A+' && $_POST['TipoSangre'] != 'A-' && $_POST['TipoSangre'] != 'AB+' && $_POST['TipoSangre'] != 'AB-' && $_POST['TipoSangre'] != 'O+' && $_POST['TipoSangre'] != 'O-' && $_POST['TipoSangre'] != 'B-' && $_POST['TipoSangre'] != 'B+'){ ?>
			<script type="text/javascript">
				alert("Tipo de sangre no válido (Utilice letras mayúsculas)");
				window.location.href="alumnos.php";
			</script>
		<?php}else if($_POST['Edad'] > 12){ ?>
	      	<script type="text/javascript">
				alert("Edad no válida (La edad máxima son 12 años)");
				window.location.href="alumnos.php";
			</script> <?php
	    }else{
			modificarAlumno($_POST['Id'],$_POST['Nombre'], $_POST['Nombre2'],$_POST['Apellido'] ,$_POST['Apellido2'], $_POST['Edad'], $_POST['TipoSangre'], $_POST['Alergias']); ?>
			<script type="text/javascript">
				alert("Alumno modificado exitosamente!");
				window.location.href="alumnos.php";
			</script> <?php
		}
	}else{ ?>
		<script type="text/javascript">
			alert("Error al modificar alumno :(");
			window.location.href="alumnos.php";
		</script>
	<?php
	}

	function modificarAlumno($ida, $nom, $nom2, $ap, $ap2, $edad, $sangre, $aler){
		require 'basedatos.php';
		 $sentencia = "UPDATE alumnos SET nombre = '".$nom."', nombre2 = '".$nom2."', apellido = '".$ap."', apellido2 = '".$ap2."', edad = '".$edad."', tiposangre = '".$sangre."', alergias = '".$aler."' WHERE id = '".$ida."' ";
		$conn->query($sentencia);
	}
?>
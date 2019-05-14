<?php
  require 'basedatos.php';
	$message = '';
  $ID = $_GET['identificador'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Evaluacion Diaria</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
	<style>
		body {font-family: Arial, Helvetica, sans-serif;}

		/* The Modal (background) */
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 1; /* Sit on top */
		  padding-top: 100px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		  background-color: #fefefe;
		  margin: auto;
		  padding: 20px;
		  border: 1px solid #888;
		  width: 80%;
		}

		/* The Close Button */
		.close {
		  color: #aaaaaa;
		  float: right;
		  font-size: 28px;
		  font-weight: bold;
		}

		.close:hover,
		.close:focus {
		  color: #000;
		  text-decoration: none;
		  cursor: pointer;
		}
		</style>
</head>

<body>
	<?php require 'partials/header.php'?>

	<a href="index.php" ><img src="images/logo_1.png" alt="" /></a>
	<h1>Introduzca evaluacion: </h1>
  <form method="post">

        <textarea cols="50" rows="4" name="eval" type="text" ></textarea>
        <br>


        <?php
          if (!isset($_POST['eval'])){
               $_POST['eval'] = "No hay evaluacion";
          }
              $texto = $_POST['eval'];
              $sql = ("UPDATE alumnos SET EVALUACIONDIARIA='$texto' WHERE ID='$ID'");
              $stmt = $conn->prepare($sql);
              if($stmt->execute()){
                  $message ='La evaluacion se ha subido exitosamente';

              }else{
                  $message = 'Error al subir la evaluacion';
              }

        ?>
        <form action="evaluacionDiaria.php" method="get" >
          <input  type="submit" value="Subir evaluacion" name="submit">
       </form>

       <?php
             if(isset($_POST['submit'])){
                 header("Location: grupos.php");
             }
        ?>

    </form>
  </body>
  </html>

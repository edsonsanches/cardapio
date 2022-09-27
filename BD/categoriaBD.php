
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$categoria=mysqli_real_escape_string($conexao, $_POST["categoria"]);

mysqli_query($conexao, "INSERT INTO categoria (nome) VALUES ('$categoria')");
header("location: ../admin/CadCategoria.php");

?>
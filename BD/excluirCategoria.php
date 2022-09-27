
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$categoria=mysqli_real_escape_string($conexao, $_POST["idcategoria"]);

mysqli_query($conexao, "DELETE FROM categoria WHERE id_categoria=$categoria");
header("location: ../admin/CadCategoria.php");

?>

<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$iditem=mysqli_real_escape_string($conexao, $_POST["iditem"]);

mysqli_query($conexao, "DELETE FROM item WHERE id_item=$iditem");
header("location: ../admin/CadItem.php");

?>
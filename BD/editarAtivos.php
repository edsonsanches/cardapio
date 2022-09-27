
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$id=mysqli_real_escape_string($conexao, $_POST["iditem"]);
$ativo=mysqli_real_escape_string($conexao, $_POST["ativo"]);

if($ativo==1){
mysqli_query($conexao, "UPDATE item SET ativo=0 WHERE id_item=$id");
}else{
mysqli_query($conexao, "UPDATE item SET ativo=1 WHERE id_item=$id");
}
header("location: ../admin/CadItem.php");
?>
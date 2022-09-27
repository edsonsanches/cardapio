
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$idcategoria=mysqli_real_escape_string($conexao, $_POST["idcategoria"]);
$nome=mysqli_real_escape_string($conexao, $_POST["nome"]);
$ingrediente=mysqli_real_escape_string($conexao, $_POST["ingrediente"]);
$valor=mysqli_real_escape_string($conexao, $_POST["valor"]);

mysqli_query($conexao, "INSERT INTO item (nome, ingrediente, valor, categoria) VALUES ('$nome','$ingrediente','$valor',$idcategoria)");
header("location: ../admin/CadItem.php");

?>
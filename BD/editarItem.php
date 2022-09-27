
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$iditem=mysqli_real_escape_string($conexao, $_POST["iditem"]);
$nome=mysqli_real_escape_string($conexao, $_POST["nome"]);
$ingrediente=mysqli_real_escape_string($conexao, $_POST["ingrediente"]);
$valor=mysqli_real_escape_string($conexao, $_POST["valor"]);
$categoria=mysqli_real_escape_string($conexao, $_POST["categoria"]);

mysqli_query($conexao, "UPDATE `item` SET `nome`= '$nome', `ingrediente`= '$ingrediente', `valor`= '$valor', `categoria`= $categoria WHERE `id_item`=$iditem");

header("location: ../admin/CadItem.php");


?>
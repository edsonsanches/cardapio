
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$idcategoria=mysqli_real_escape_string($conexao, $_POST["idcategoria"]);
$nome=mysqli_real_escape_string($conexao, $_POST["nome"]);

    mysqli_query($conexao, "UPDATE `categoria` SET `nome`= '$nome' WHERE `id_categoria`=$idcategoria");
    header("location: ../admin/CadCategoria.php");

?>

<?php

session_start();	

include("conecta.php");

$imagem = $_FILES["imagem"];
$id=mysqli_real_escape_string($conexao, $_POST["id"]);


    $ext = strtolower(substr($_FILES["imagem"]['name'],-4)); //Pegando extensão do arquivo
    if($ext=="jpeg"){
        $ext = ".jpeg";
    }
    $new_name = date("Ymd-His") . $ext; //Definindo um novo nome para o arquivo
    $dir = '../assets/img/menu/'; //Diretório para uploads 
    $nomefim='assets/img/menu/'.$new_name;
    move_uploaded_file($_FILES["imagem"]['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    $mes=date('m');
$ano=date('Y');
mysqli_query($conexao, "update item set img='$nomefim' where id_item=$id");

		header("location: ../admin/CadItem.php");

?>
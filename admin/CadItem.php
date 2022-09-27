<?php
include 'topo.php';
include("../BD/conecta.php");
?>

<script>
function pergunta(){ 
   // retorna true se confirmado, ou false se cancelado
   return confirm('Tem certeza que deseja excluir?');
}
</script>

<center>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cadastrar Itens</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="register-form">
               <form action="../BD/itemBD.php" method="post" data-toggle="validator" role="form">
                  <div class="form-group">
                     <input id="nome" name="nome" type="text" required class="form-control" placeholder="Informe aqui o nome">
                  </div>
                  <div class="form-group">
                     <input id="ingrediente" name="ingrediente" type="text" required class="form-control" placeholder="Informe aqui os ingredientes">
                  </div>
                  <div class="form-group">
                     <input id="valor" name="valor" type="text" required class="form-control" placeholder="Informe aqui o valor">
                  </div>
                  <div class="form-group">
                  <select id="idcategoria" name="idcategoria" class="custom-select" required>
              <option value="">Informe uma categoria</option>
              <?php $selecionaGiras=mysqli_query($conexao, "select * from categoria order by id_categoria");
while($giras=mysqli_fetch_array($selecionaGiras)){ ?>

<option value="<?php echo $giras["id_categoria"];?>">
<?php echo $giras['nome'];?>
</option>
<?php } ?>

</select>
<div class="invalid-feedback">Informe uma categoria valida</div>
                  </div>

				  <center>
                  <button type="submit" class="btn btn-primary">Cadastrar</button><br>
				  
				  </center>
				  </form>
				  <br>
				   <?php
    				 

$selecionaCategoria=mysqli_query($conexao, "select * from item order by id_item");

if(isset($selecionaCategoria)){
    
    ?>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome/Ingredientes/Valor/Categoria</th>
      <th scope="col">Imagem</th>
      <th scope="col">Ativo?</th>
      <th scope="col">X</th>

    </tr>
    </thead>
    <tbody>
        <?php while($categorias=mysqli_fetch_array($selecionaCategoria)){ ?>
    <tr>
      <th scope="row">
        <?php echo $categorias['id_item'];?>
    </th>
      <td>
      <form action="../BD/editarItem.php" method="post">
      <input type="hidden" name="iditem" value="<?php echo $categorias['id_item']; ?>"/><br>
              <input type="text" name="nome" value="<?php echo $categorias['nome']; ?>"/>  <br> 
              <input type="text" name="ingrediente" value="<?php echo $categorias['ingrediente']; ?>"/><br>
              <input type="text" name="valor" value="<?php echo $categorias['valor']; ?>"/><br>

              <select id="categoria" name="categoria" required>
              <option value="<?php echo $categorias['categoria'];?>">MANTER ATUAL</option>
              <?php $selecionaGiras=mysqli_query($conexao, "select * from categoria order by id_categoria");
while($giras=mysqli_fetch_array($selecionaGiras)){ ?>

<option value="<?php echo $giras["id_categoria"];?>">
<?php echo $giras['nome'];?>
</option>
<?php } ?>

</select>
<div class="invalid-feedback">Informe uma categoria valida</div>

    <button style="background-color: green !important;" type="submit" class="btn btn-primary">Atualizar</button>
    </form>
    </td>

    <td>

    <form action="../BD/gravaIMGPROD.php" method="POST" enctype="multipart/form-data">
                                <center>
                                <input type="hidden" name="id" value="<?php echo $categorias["id_item"]; ?>"/>
                                <img src="../<?php echo $categorias["img"];?>" height=50 width=50 alt="IMG ATUAL"><br>
		<input type="file" name="imagem"/><br>
		
		<input type="submit" value="Alterar"/>
		</center>
	</form>
             
    </td>
    <td>
    <form action="../BD/editarAtivos.php" method="post">
                              <input type="hidden" name="iditem" value="<?php echo $categorias["id_item"]; ?>"/>
                              <input type="hidden" name="ativo" value="<?php echo $categorias["ativo"]; ?>"/>
                              <?php
                              if($categorias["ativo"]==1){
                              ?>
                              <button style="background-color: green !important;" type="submit" class="btn btn-primary">DESATIVAR</button>
                              <?php
                              }else{
                              ?>
                              <button style="background-color: red !important;" type="submit" class="btn btn-primary">ATIVAR</button>
                              <?php
                              }
                              ?>
                            </form>
    </td>
         <td>
         <form action="../BD/excluirItem.php" method="post">
              <input type="hidden" name="iditem" value="<?php echo $categorias['id_item']; ?>"/>
              <button style="background-color: red !important;" type="submit" class="btn btn-primary" onclick='return pergunta();'>X</button>
              </form>
         </td>   

      
    </tr>
      <?php } ?>
    </tbody>
    </table>
    
    <?php
}else{
    ?>
    
		<h3>Nenhuma categoria cadastrada no momento</h3>
		
		<?php } ?>
				  
               
            </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

</center>
<?php
include 'rodape.php';
?>
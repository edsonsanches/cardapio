<?php
include 'topo.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Cadastrar Categoria</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="register-form">
               <form action="../BD/categoriaBD.php" method="post" data-toggle="validator" role="form">
                  <div class="form-group">
                     <input id="categoria" name="categoria" type="text" required class="form-control" placeholder="Informe aqui a categoria">
                  </div>


				  <center>
                  <button type="submit" class="btn btn-primary">Cadastrar</button><br>
				  
				  </center>
				  </form>
				  <br>
				   <?php
    				  include("../BD/conecta.php");

$selecionaCategoria=mysqli_query($conexao, "select * from categoria order by id_categoria");

if(isset($selecionaCategoria)){
    
    ?>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Categoria</th>
      <th scope="col"></th>

    </tr>
    </thead>
    <tbody>
        <?php while($categorias=mysqli_fetch_array($selecionaCategoria)){ ?>
    <tr>
      <th scope="row">
        <?php echo $categorias['id_categoria'];?>
    </th>
      <td>
      <form action="../BD/editarNomeCategoria.php" method="post">
              <input type="hidden" name="idcategoria" value="<?php echo $categorias['id_categoria']; ?>"/>
              <input type="text" name="nome" value="<?php echo $categorias['nome']; ?>"/>
              <button style="background-color: green !important;" type="submit" class="btn btn-primary">Atualizar</button>
              </form>
    </td>
    <td>
        <?php
        $idItemCat=$categorias['id_categoria'];
        $ValidarExcluirCat=mysqli_query($conexao, "select * from item where categoria=$idItemCat");
        $totalCat = mysqli_num_rows($ValidarExcluirCat); 
        if($totalCat === 0){
        ?>
      <form action="../BD/excluirCategoria.php" method="post">
              <input type="hidden" name="idcategoria" value="<?php echo $categorias['id_categoria']; ?>"/>
              <button style="background-color: red !important;" type="submit" class="btn btn-primary" onclick='return pergunta();'>X</button>
              </form>
              <?php } ?>
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
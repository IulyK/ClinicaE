<?php 
require_once '../cabecalho.php';
require_once '../model/Pessoa.php'; 
require_once '../Conexao.php';
include_once '../model/Pessoa.php';

$pessoa = new Pessoa();
$id = $_GET['id'];
$stmt = Conexao::getInstance()->prepare("select * from pessoa");
$stmt -> execute();

?>
<script type="text/javascript">
 function Confirmacao(){
  if( confirm("Deseja mesmo deletar?") )
   return true;
  
 else
   return false;}
</script>   
<div class="col-md-8">
   <div >
     <a href="cadastroPessoa.php" class="btn btn-primary pull-right h1">Novo Cliente</a>
    </div>
<h1 class="page-header">Clientes</h1>
  <div class="table-responsive">
    <table class="table table-striped  table-hover">
    <thead>
      <tr>
        <th>
          Nome
        </th>
        <th>
          Endereço
        </th>
        <th>
          Telefone
        </th>
        <th>
          CPF
        </th>
        <th>
          Email
        </th>
           <th>
           Ações
        </th>
        
      </tr>
    </thead>
    <tbody>
      <?php
     

      while($res = $stmt->fetch(PDO::FETCH_ASSOC)){?>
      <tr>
        
        <td>
	  <?php echo $res['nome']; ?>
	</td>
        <td>
	  <?php echo $res['endereco']; ?>
	</td>
        <td>
	  <?php echo $res['telefone']; ?>
	</td>
        <td>
	  <?php echo $res['cpf']; ?>
	</td>
	<td>
	  <?php  echo $res['email']; ?>
	</td>
        
        <th><?php echo "<a href='visualizarPessoa.php?id=" . $res['id'] . "' class='btn btn-success'>Visualizar</a>" ?></th>
      
          <th><?php echo "<a href='editarCadastroPessoa.php?id=" . $res['id'] . "' class='btn btn-warning'>Alterar</a>" ?></th>
          <th><?php echo "<a href='excluirPessoa.php?id=" . $res['id'] ."' class='btn btn-danger' onClick='return Confirmacao();'>Excluir</a>"?></th>
        </tr>
       <?php  } ?>
  




     </tbody>
        </table>
    
 </div>
<!--<ul class="pagination pagination-sm">
  <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
</ul>-->
 </div>


</body>
</html>   





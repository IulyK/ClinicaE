<?php
require_once '../cabecalho.php';
require_once '../model/Pessoa.php';
require_once '../Conexao.php';

$pessoa = new Pessoa();
$id = $_GET['id'];
$stmt = Conexao::getInstance()->prepare("select * from pessoa where id = '$id'");
$stmt->execute();
?>

<div class="col-xs-8 ">
  <h1 class="page-header">Cliente</h1>
  <?php while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
   <dl class="dl-horizontal" >
   <dt> Nome: </dt>
   <dd> <?php echo $res['nome']; ?></dd>
   <dt> Endereço: </dt>
   <dd><?php echo $res['endereco']; ?></dd>
   <dt>Telefone:</dt>
   <dd><?php echo $res['telefone']; ?></dd>
   <dt>CPF:</dt>
   <dd><?php echo $res['cpf']; ?> </dd>
   <dt>E-mail:<dt>
   <dd><?php echo $res['email']; ?></dd>
   <dt><?php echo "<a href='listarPessoa.php' class='btn btn-primary'>Voltar</a>"?></dt>
  <?php } ?>
</dl>

</div>
</body>
</html>   





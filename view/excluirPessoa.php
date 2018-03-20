
<?php require_once '../cabecalho.php'; ?>
<?php include_once '../controller/PessoaDAO.php'; ?>
<?php require_once '../Conexao.php';?>
<?php include_once '../model/Pessoa.php'; 
$id = $_GET['id'];
$pessoa = new Pessoa();
$pessoaDAO = new PessoaDAO();
$pessoa->setId($id);
$pessoaDAO->Deletar($pessoa);
 
 
header('Location:listarPessoa.php');




<?php
include_once '../model/Pessoa.php';
include_once '../controller/PessoaDAO.php';


$pessoa = new Pessoa();
$pessoa->setNome($_POST['nome']);
$pessoa->setEndereco($_POST['endereco']);
$pessoa->setEmail($_POST['email']);
$pessoa->setTelefone($_POST['telefone']);
$pessoa->setCpf($_POST['cpf']);
$pessoa->setSenha($_POST['senha']);
$pessoa->setId($_POST['id']);

$pessoaDAO = new PessoaDAO();
$pessoaDAO->Editar($pessoa);


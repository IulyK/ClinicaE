<?php

require_once "../model/Pessoa.php";
require_once '../controller/PessoaDAO.php';

$pessoa = new Pessoa();
$pessoa->setNome($_POST['nome']);
$pessoa->setEndereco($_POST['endereco']);
$pessoa->setTelefone($_POST['telefone']);
$pessoa->setEmail($_POST['email']);
$pessoa->setCpf($_POST['cpf']);
$pessoa->setSenha($_POST['senha']);

$pessoaDAO = new PessoaDAO();
$pessoaDAO->Inserir($pessoa);

header('Location:listarPessoa.php');


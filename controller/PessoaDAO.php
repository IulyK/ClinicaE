<?php

require_once '../Conexao.php';
require_once '../model/Pessoa.php';

class PessoaDAO {

 public static $instance;

 function __construct() {
  
 }

 public function Inserir(Pessoa $pessoa) {
  try {
   $sql = "INSERT INTO pessoa(
                           nome,
                           endereco,
                           telefone,
                           email,
                           cpf,
                           senha)
                           VALUES(
                           :nome,
                           :endereco,
                           :telefone,
                           :email,
                           :cpf,
                           :senha)";
   $p_sql = Conexao::getInstance()->prepare($sql);

   $p_sql->bindValue(":nome", $pessoa->getNome());
   $p_sql->bindValue(":endereco", $pessoa->getEndereco());
   $p_sql->bindValue(":telefone", $pessoa->getTelefone());
   $p_sql->bindValue(":email", $pessoa->getEmail());
   $p_sql->bindValue(":cpf", $pessoa->getCpf());
   $p_sql->bindValue(":senha", $pessoa->getSenha());
   $p_sql->execute();
  } catch (Exception $ex) {
   print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
   echo "ERRO NO INSERIR" . $ex;
  }
 }
 public function Editar(Pessoa $pessoa){
  try{
   $sql ="UPDATE pessoa set
               nome = :nome,
               endereco = :endereco,
               telefone = :telefone,
               email = :email,
               cpf = :cpf,
               senha = :senha
               WHERE id= :id";
   
   $p_sql = Conexao::getInstance()->prepare($sql);
   $p_sql->bindValue(":nome",$pessoa->getNome());
   $p_sql->bindValue(":endereco",$pessoa->getEndereco());
   $p_sql->bindValue(":telefone",$pessoa->getTelefone());
   $p_sql->bindValue(":email",$pessoa->getEmail());
   $p_sql->bindValue(":cpf",$pessoa->getCpf());
   $p_sql->bindValue(":senha",$pessoa->getSenha());
   $p_sql->bindValue(":id",$pessoa->getId());
   $p_sql->execute();
    header('Location: listarPessoa.php');
  } catch (Exception $ex) {
 print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
   echo "ERRO NO EDITAR" . $ex;
  }
 }
 
 public function Deletar(Pessoa $pessoa){
  try{
   $sql = "DELETE FROM pessoa WHERE id = :id";
   $p_sql = Conexao::getInstance()->prepare($sql);
   $p_sql->bindParam(":id",$pessoa->getId(),PDO::PARAM_INT);
   $p_sql->execute();
   header('Location:listarPessoa.php');
  } catch (Exception $ex) {
 print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
   echo "ERRO NO DELETAR" . $ex;
  }
 }

}

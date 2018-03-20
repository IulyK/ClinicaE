<?php

class Pessoa {
 
 private $id;
 private $nome;
 private $endereco;
 private $cpf;
 private $email;
 private $telefone;
 private $senha;
 
 function __construct() {
  
 }
 function getId() {
  return $this->id;
 }

 function getNome() {
  return $this->nome;
 }

 function getEndereco() {
  return $this->endereco;
 }

 function getCpf() {
  return $this->cpf;
 }

 function getEmail() {
  return $this->email;
 }

 function getTelefone() {
  return $this->telefone;
 }
 function getSenha() {
  return $this->senha;
 }

 function setSenha($senha) {
  $this->senha = $senha;
 }

  function setId($id) {
  $this->id = $id;
 }

 function setNome($nome) {
  $this->nome = $nome;
 }

 function setEndereco($endereco) {
  $this->endereco = $endereco;
 }

 function setCpf($cpf) {
  $this->cpf = $cpf;
 }

 function setEmail($email) {
  $this->email = $email;
 }

 function setTelefone($telefone) {
  $this->telefone = $telefone;
 }



}

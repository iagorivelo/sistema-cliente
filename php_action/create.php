<?php
// Iniciando a Sessão
session_start();

// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-cadastrar']))
{
  $nome      = mysqli_escape_string($connect, $_POST['nome']);
  $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
  $email     = mysqli_escape_string($connect, $_POST['email']);
  $idade     = mysqli_escape_string($connect, $_POST['idade']);

  $sql = "INSERT INTO clientes_tb (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

  if(mysqli_query($connect, $sql))
  {
    $_SESSION['mensagem'] = "Cadastrado com Sucesso";
   header('Location: ../index.php'); 
  }else
  {
    $_SESSION['mensagem'] = "Erro ao Cadastrar Cliente";
    header('Location: ../index.php');
  }
}

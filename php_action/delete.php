<?php
// Iniciando a Sessão
session_start();

// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar']))
{
  $id  = mysqli_escape_string($connect, $_POST['id']);

  $sql = "DELETE FROM clientes_tb WHERE id = '$id '";

  if(mysqli_query($connect, $sql))
  {
    $_SESSION['mensagem'] = "Cliente Deletado com Sucesso";
   header('Location: ../index.php'); 
  }else
  {
    $_SESSION['mensagem'] = "Erro ao Deletar Cliente";
    header('Location: ../index.php');
  }
}

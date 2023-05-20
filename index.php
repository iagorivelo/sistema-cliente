<?php

// Conexão
include_once 'php_action/db_connect.php';

// Header
include_once 'includes/header.php';

// Mensagems
include_once 'includes/message.php';
?>
<div class="row">
  <div class="col s12 m6 push-m3">
    <h3 class="light">Clientes</h3>
    <div style="display: flex; gap: 1rem;">
      <a href="adicionar.php" class="btn">Adicionar Cliente</a>
      <a href="filtrar.php" style="display: flex; justify-content: center; align-items: center;" class="btn green"><i class="material-icons">filter_list</i>Filttrar</a>
    </div>
    <br>
    <table class="striped">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Email</th>
          <th>Idade</th>
        </tr>
      </thead>

      <tbody>
        <?php
          $sql       = "SELECT * FROM clientes_tb";
          $resultado = mysqli_query($connect, $sql);

          if(mysqli_num_rows($resultado) > 0)
          {

            while($dados = mysqli_fetch_array($resultado))
            {
        ?>
        <tr>
          <td><?php echo $dados['nome']; ?></td>
          <td><?php echo $dados['sobrenome']; ?></td>
          <td><?php echo $dados['email']; ?></td>
          <td><?php echo $dados['idade']; ?></td>
          <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
          <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

          <!-- Modal Structure -->
          <div id="modal<?php echo $dados['id']; ?>" class="modal">
            <div class="modal-content">
              <h4>Ops!</h4>
              <p>Deseja excluir o Cliente?</p>
            </div>
            <div class="modal-footer">
              <form action="php_action/delete.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                <button type="submit" name="btn-deletar" class="btn red">Confirmar</button>

                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </form>
            </div>
          </div>

        </tr>
        <?php
           }
          }
          else
          {
          ?>
            <tr>
              <td style="color:#6d6d6d; font-family: Verdana; text-align: center;" colspan='4'> Nenhum Registro Encontrado </td>
            </tr>
          <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>

<?php
// Verificação se o cookie é vazio, se não, redirecionar para a tela de sucesso
if (isset($_COOKIE['email']) && !empty($_COOKIE['email'])) {
                    echo "<script>alert('Você já está logado! redirecionando o usuário para a tela de sucesso.'); document.location.href='sucesso.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <link href="/css/style.css" rel="stylesheet">
  <title>Login</title>
</head>
<body>
  <section class="content">
    <div class="bloco1">
      <h1>Acesso</h1>
      <div class="dados">
        <?php
          $json = file_get_contents('users.txt');
          $usuarios = json_decode($json);

          echo "<table>";
          echo "<tr><th>Usuários</th><th>Senhas</th></tr>";

          foreach ($usuarios as $usuario) {
            echo '<tr onclick="document.getElementById(\'email\').value=\'' . base64_decode($usuario->email) . '\';document.getElementById(\'senha\').value=\'' . base64_decode($usuario->senha) . '\'">';
            echo "<td>" . base64_decode($usuario->email) . "</td>";
            echo "<td>" . base64_decode($usuario->senha) . "</td>";
            echo "</tr>";
          } 

          echo "</table>";
        ?>
        </div>
      </div>
    <form class="bloco2" action="auten.php" method="post">
      <h1>LOGIN</h1>
      <div>
        <label for="login">Email:</label>
        <input type="email" id="email" name="email">
      </div>
      <div>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha">
      </div>
      <div>
        <button type="submit">Entrar</button>
      </div>
      <p class="registro">Não possui cadastro? <a href="cadastro.php">Clique aqui</a></p>
    </form>
  </section>
</body>
</html>

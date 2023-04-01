<?php

    function gravar($email, $senha, $confirmaSenha) {
    if ($senha != $confirmaSenha) {
        echo "<script>alert('As senhas não coincidem!')</script>";
        return;
    }

    $arquivo = "users.txt";

    // Lê os usuários do arquivo e converte para um array
    $usuarios = file_get_contents($arquivo);
    $usuarios = json_decode($usuarios, true);


    // Verifica se o e-mail já está cadastrado
    foreach ($usuarios as $usuario) {
    if ($usuario['email'] === $email) {
        echo "<script>alert('Este e-mail já está cadastrado!')</script>";
        return;
        }
    }
      

    // Adiciona o novo usuário no array
    $novoUsuario = array(
        'email' => $email,
        'senha' => $senha,
    );
      
    $usuarios[] = $novoUsuario;

    // Converte o array para uma string JSON e escreve no arquivo
    $json = json_encode($usuarios, JSON_PRETTY_PRINT) . PHP_EOL;
    file_put_contents($arquivo, $json);

    echo "<script>alert('Registrado com sucesso!'); document.location.href='index.php';</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = (base64_encode($_POST['email']));
    $senha = (base64_encode($_POST['senha']));
    $confirmaSenha = (base64_encode($_POST['confirmaSenha']));

  
    gravar($email, $senha, $confirmaSenha);
}

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="/css/style.css" rel="stylesheet">
  <title>Cadastro</title>
</head>
<body>
  <div class="nav"> 
        <a href="index.php" class="link1"><i class="fa fa-arrow-left "></i> Voltar para o início</a>
  <section class="content">
    <form class="bloco2" method="post">
      <h1>Cadastro</h1>
      <div>
        <label for="login">Email:<br></label>
        <input type="email" id="login" name="email">
      </div>
      <div>
        <label for="senha">Senha:<br></label>
        <input type="password" id="senha" name="senha">
      </div>
      <div>
        <label for="login">Confirme sua senha:<br></label>
        <input type="password" id="confirmaSenha" name="confirmaSenha">
      </div>
      <div>
        <button type="submit">Entrar</button>
      </div>
    </form>
  </section>
  <script src="js/script.js"></script>
</body>
</html>
<?php

// Lê os usuários do arquivo users.txt
$usuarios = file_get_contents('users.txt');
$usuarios = json_decode($usuarios, true);

// Obtém os dados do formulário
$email = base64_encode($_POST['email']);
$senha = base64_encode($_POST['senha']);

// Procura o usuário com o login e senha fornecidos
foreach ($usuarios as $usuario) {
    if ($usuario['email'] === $email && $usuario['senha'] === $senha) {
        setcookie('email', $email, 0, '/');
        header('Location: sucesso.php');
        exit();
    }
}

// Redireciona o usuário para a página de erro
header('Location: erro.php');
exit();

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/style.css" rel="stylesheet">
    <title>Sucesso</title>
</head>
<body>
    <div class="nav"> 
        <a href="index.php" class="link1"><i class="fa fa-arrow-left "></i> Voltar para o início</a><br><br>
      <button onclick="logout()">Logout</button>
    </div>
    <div class="content">
        <div class="bloco1"> 
            <?php
            
            // Lê os usuários do arquivo users.txt
            $usuarios = file_get_contents('users.txt');
            $usuarios = json_decode($usuarios, true);
            
            // Verifica se o cookie com o email está definido
            if (!isset($_COOKIE['email'])) {
                echo "<script>alert('Sua sessão expirou!'); document.location.href='index.php';</script>";
                exit();
            }
            
            // Obtém o email criptografado do cookie
            $email = $_COOKIE['email'];
            
            // Procura o usuário com o email fornecido
            foreach ($usuarios as $usuario) {
                if ($usuario['email'] === $email) {
            
                    // Descriptografa o email e a senha
                    $descriptemail = base64_decode($email);
                    $descriptsenha = base64_decode($usuario['senha']);
            
                    // Exibe a mensagem de sucesso
                    echo "<h1>Bem-vindo $descriptemail!</h1>";
                    echo "<p>Sua autenticação foi bem-sucedida.</p>";
                    echo "<strong>Email e senha criptografadas:</strong>";
                    echo "<p>Email: <strong>$email</strong><p>";
                    echo "<p>Senha: <strong>{$usuario['senha']}</strong><p>";
                    echo "<strong>Email e senha Descriptografadas:</strong>";
                    echo "<p>Email: <strong>$descriptemail</strong><p>";
                    echo "<p>Senha: <strong>$descriptsenha</strong><p>";
                }
            }
            
            ?>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>

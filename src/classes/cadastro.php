<?php
require_once 'Usuario.php';
 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['usuario'];
    $senha = $_POST['senha'];
 
    // Criptografa a senha antes de salvar no banco
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
 
    // Cria a instância do Usuário
    $usuario = new Usuario();
 
    // Método para cadastrar o usuário (criar uma função no banco para inserir)
    if ($usuario->cadastrarUsuario($email, $senhaHash)) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário.";
    }
}
?>
 
<form method="post" action="cadastro.php">
    <label for="usuario">E-mail:</label>
    <input type="email" name="usuario" id="usuario" required>
 
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required>
 
    <button type="submit">Cadastrar</button>
</form>
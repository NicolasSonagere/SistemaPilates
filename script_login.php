<?php
// Iniciar sessão
session_start();

require 'conexao.php';

// Processar o formulário de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Verificar se os campos não estão vazios
    if (!empty($usuario) && !empty($senha)) {
        // Buscar usuário no banco
        $sql = "SELECT id_usuario, nome_usuario, perfil FROM Usuarios WHERE nome_usuario = ? AND senha = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$usuario, $senha]);
        $numRows = $stmt->rowCount();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($numRows === 1) {
            // Usuário encontrado
            $user = $result;
            $_SESSION['id_usuario'] = $user['id_usuario'];
            $_SESSION['nome'] = $user['nome_usuario'];
            $_SESSION['perfil'] = $user['perfil'];

            // Redirecionar com base no perfil
            if ($user['perfil'] === 'administrador') {
                header("Location: paginas/home.php");
            } elseif ($user['perfil'] === 'professor') {
                header("Location: paginas/home.php");
            }
            exit();
        } else {
            $error = "Usuario ou senha inválidos!";
        }
    } else {
        $error = "Por favor, preencha todos os campos!";
    }
}
?>

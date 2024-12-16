<?php
session_start();
require '../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo/styles.css">
    <title>Home</title>
</head>
<body>
    
    <?php if ($_SESSION['perfil'] === 'administrador'): ?>
        <!-- Navbar para Administrador -->
        <nav class="navbar">
            <a href="alunos.php">Gerenciar alunos</a>
            <a href="listarAlunosTurma.php">Turmas</a>
            <a href="listarAlunos.php">Alunos</a>
            <a href="listarMensalidadeAtrasadas.php">Mensalidades</a>
            <a href="listarTaxaPresenca.php">Porcentagens Presenças</a>
        </nav>
    <?php elseif ($_SESSION['perfil'] === 'professor'): ?>
        <!-- Navbar para Professor -->
        <nav class="navbar">
            <a href="listarAniversariantes.php">Aniversariantes</a>
            <a href="inserirFaltas.php">Presenças</a>
        </nav>
    <?php else: ?>
        <!-- Navbar padrão ou mensagem de erro -->
        <nav class="navbar">
            <a href="../login.php">Login</a>
        </nav>
        <p style="padding: 1em;">Você precisa estar logado para acessar o sistema.</p>
    <?php endif; ?>

    <h1 style="font-family: Arial, sans-serif; color: #333; display:flex; justify-content: center; align-items: center; height: 70vh">Bem-vindo!</h1>
</body>
</html>
<?php
session_start();
require '../conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar alunos</title>
    <link rel="stylesheet" href="../estilo/styles.css">
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

    <div style="height: 80vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <h1>O que deseja fazer?</h1>
        <a href="inserirAlunoPag.php" style="display: inline-block; padding: 10px 20px; margin: 10px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px; font-size: 16px; text-align: center;">Cadastrar um novo aluno</a>
        <a href="excluirAlunoPag.php" style="display: inline-block; padding: 10px 20px; margin: 10px; background-color: #DC3545; color: white; text-decoration: none; border-radius: 5px; font-size: 16px; text-align: center;">Excluir um aluno</a>
        <a href="atualizarAlunoPag.php" style="display: inline-block; padding: 10px 20px; margin: 10px; background-color:rgb(20, 200, 50); color: white; text-decoration: none; border-radius: 5px; font-size: 16px; text-align: center;">Atualizar um aluno</a>
    </div>
</body>
</html>

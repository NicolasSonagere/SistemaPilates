<?php
session_start();
require '../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Aluno</title>
    <link rel="stylesheet" href="../estilo/styles.css">
</head>
<body>

    <?php if ($_SESSION['perfil'] === 'administrador'): ?>
        <!-- Navbar para Administrador -->
        <nav class="navbar">
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

    <h1>Atualizar Dados do Aluno</h1>
    <form action="../cadastroAluno/atualizarAluno.php" method="POST">
        <label for="id">ID do Aluno:</label>
        <input type="number" name="id" required><br><br>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" required><br><br>

        <label for="genero">Gênero:</label>
        <select name="genero" required>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="outro">Outro</option>
        </select><br><br>

        <label for="turma_id">ID da Turma:</label>
        <input type="number" name="turma_id" required><br><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>

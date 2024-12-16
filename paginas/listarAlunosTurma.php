<?php
session_start();
require '../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar Alunos</title>
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

    <h1>Lista de Alunos por Turma</h1>

    <form action="listarAlunosTurma.php" method="POST">
        <input type="number" name="turma_id" required>
        <button type="submit">Selecionar</button>
    </form>

    <table>
    <?php
    require '../conexao.php';
    if (isset($_POST['turma_id'])) {
        $turma_id = $_POST['turma_id'];
        $sql = "SELECT * FROM alunos where turma_id = " . $turma_id . " ORDER BY nome";
        $stmt = $pdo->query($sql);

        $tabela = "";
        $tem_registro = False;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tabela = $tabela . "<tr>";
            $tabela = $tabela . "<td>".$row['nome']."</td><td>".$row['turma_id']."</td>";
            $tabela = $tabela . "</tr>";
            $tem_registro = True;
        }
        if ($tem_registro) {
            echo "<tr><th>Nome</th><th>Turma</th></tr>";
            echo $tabela;
        } else {
            echo "<tr><th>Nenhum Registro Encontrado!</th></tr>";
        }
    }
    ?>
    </table>
</body>
</html>

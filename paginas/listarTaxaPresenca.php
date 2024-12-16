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

    <h1>Lista de Taxas de Presença</h1>

    <table>
        <?php
        require '../conexao.php';

        // Consulta ao banco de dados
        $sql = "SELECT a.id_aluno, a.nome, t.id_turma, t.nome_turma, ROUND(100 * SUM(p.presente) / COUNT(p.presente), 2) AS taxa_presenca FROM presencas p JOIN alunos a ON p.aluno_id = a.id_aluno JOIN turmas t ON a.turma_id = t.id_turma GROUP BY a.id_aluno, a.nome ORDER BY taxa_presenca DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $tem_registro = false;
        $cabecalho_exibido = false;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Exibe o cabeçalho apenas na primeira iteração
            if (!$cabecalho_exibido) {
                echo "<tr>";
                foreach (array_keys($row) as $campo) {
                    echo "<th>" . htmlspecialchars($campo) . "</th>";
                }
                echo "</tr>";
                $cabecalho_exibido = true;
            }

            // Exibe os dados do registro
            echo "<tr>";
            foreach ($row as $valor) {
                echo "<td>" . htmlspecialchars($valor) . "</td>";
            }
            echo "</tr>";

            $tem_registro = true;
        }

        // Caso não existam registros
        if (!$tem_registro) {
            echo "<tr><td colspan='100%'>Nenhum Registro Encontrado!</td></tr>";
        }
        ?>
    </table>

</body>
</html>

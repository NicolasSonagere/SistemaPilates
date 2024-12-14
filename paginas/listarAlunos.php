<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar Alunos</title>
    <link rel="stylesheet" href="../estilo/styles.css">
</head>
<body>
    <h1>Lista de Alunos</h1>
    <?php
    require '../conexao.php';

    $sql = "SELECT * FROM alunos ORDER BY nome";
    $stmt = $pdo->query($sql);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Nome: " . $row['nome'] . " - Turma: " . $row['turma_id'] . "<br>";
    }
    ?>
</body>
</html>

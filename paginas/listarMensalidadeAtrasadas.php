<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar Alunos</title>
    <link rel="stylesheet" href="../estilo/styles.css">
</head>
<body>
    <h1>Lista de Mensalidades Atrasadas</h1>
    
    <table>
    <?php
    require '../conexao.php';
    $sql = "SELECT * FROM alunos where mensalidade_pago = 0 ORDER BY nome";
    $stmt = $pdo->query($sql);

    $tabela = "";
    $tem_registro = False;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $tabela = $tabela . "<tr>";
        $tabela = $tabela . "<td>".$row['nome']."</td> <td>".$row['turma_id']."</td>";
        $tabela = $tabela . "</tr>";
        $tem_registro = True;
    }
    if ($tem_registro) {
        echo "<tr><th>Nome</th><th>Turma</th></tr>";
        echo $tabela;
    } else {
        echo "<tr><th>Nenhum Registro Encontrado!</th></tr>";
    }
    ?>
    </table>
</body>
</html>

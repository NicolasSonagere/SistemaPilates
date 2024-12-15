<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar Alunos</title>
    <link rel="stylesheet" href="../estilo/styles.css">
</head>
<body>
    <h1>Lista de Aniversariantes</h1>
    
    <table>
    <?php
    require '../conexao.php';
    $sql = "SELECT * FROM alunos ORDER BY nome";
    $stmt = $pdo->query($sql);

    $tabela = "";
    $tem_registro = False;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if (substr($row['data_nascimento'], 5, 2) === date("m")){
            $tabela = $tabela . "<tr>";
            $tabela = $tabela . "<td>".$row['nome']."</td> <td>".$row['turma_id']."</td> <td>".$row['data_nascimento']."</td>";
            $tabela = $tabela . "</tr>";
            $tem_registro = True;
        }
    }
    if ($tem_registro) {
        echo "<tr><th>Nome</th><th>Turma</th><th>Data de Nascimento</th></tr>";
        echo $tabela;
    } else {
        echo "<tr><th>Nenhum Registro Encontrado!</th></tr>";
    }
    ?>
    </table>
</body>
</html>

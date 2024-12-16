<?php
require '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $genero = $_POST['genero'];
    $receita = $_POST['receita'];

    $sql = "SELECT turma_id, COUNT(*) AS quantidade_alunos FROM alunos WHERE genero = '".$genero."' GROUP BY turma_id HAVING COUNT(*) < 8 ORDER BY COUNT(*) ASC LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (is_array($row) && isset($row["turma_id"])) {
        $turma_id = $row["turma_id"];
    } else {
        $sql = "INSERT INTO turmas(nome_turma, genero) value (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["Turma do ".$nome, $genero]);
        $turma_id = $pdo->lastInsertId();
    }

    $sql = "INSERT INTO alunos (nome, data_nascimento, genero, turma_id, receita) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $data_nascimento, $genero, $turma_id, $receita]);

    echo "Aluno cadastrado com sucesso!";
}
?>

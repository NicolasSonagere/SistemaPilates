<?php
require '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $genero = $_POST['genero'];
    $turma_id = $_POST['turma_id'];

    $sql = "INSERT INTO alunos (nome, data_nascimento, genero, turma_id) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $data_nascimento, $genero, $turma_id]);

    echo "Aluno cadastrado com sucesso!";
}
?>

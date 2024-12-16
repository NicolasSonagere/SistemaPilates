<?php
require '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $genero = $_POST['genero'];
    $turma_id = $_POST['turma_id'];

    $sql = "UPDATE alunos SET nome = ?, data_nascimento = ?, genero = ?, turma_id = ? WHERE id_aluno = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $data_nascimento, $genero, $turma_id, $id]);

    echo "Dados do aluno atualizados!";
}
?>

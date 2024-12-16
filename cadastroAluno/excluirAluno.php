<?php
require '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM alunos WHERE id_aluno = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    echo "Aluno excluído!";
}
?>

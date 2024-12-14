<?php
require '../conexao.php';

$sql = "SELECT * FROM alunos ORDER BY nome";
$stmt = $pdo->query($sql);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Nome: " . $row['nome'] . " - Turma: " . $row['turma_id'] . "<br>";
}
?>

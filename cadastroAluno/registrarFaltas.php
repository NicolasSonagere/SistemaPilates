<?php
require '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $turma_id = $_POST["turma_id"];
    $dataAtual = date("Y-m-d");

    $sql = "INSERT INTO presencas (aluno_id, turma_id, data_presenca, presente) SELECT id_aluno, ".$turma_id.", '".$dataAtual."', 0 FROM alunos WHERE turma_id = ".$turma_id;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    foreach ($_POST as $key => $value) {
        // Verifica se a chave corresponde ao formato 'nome_N', onde N é um número
        if (preg_match('/^aluno_\d+$/', $key, $matches)) {
            $id_aluno = substr($key, 6);
            $presenca = 0;
            echo "".$value;

            $sql = "UPDATE presencas set presente = 1 where aluno_id = ".$id_aluno;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Excluir Aluno</title>
    <link rel="stylesheet" href="../estilo/styles.css">
</head>
<body>
    <h1>Excluir Aluno</h1>
    <form action="../cadastroAluno/excluirAluno.php" method="POST">
        <label for="id">ID do Aluno:</label>
        <input type="number" name="id" required><br><br>

        <button type="submit">Excluir</button>
    </form>
</body>
</html>

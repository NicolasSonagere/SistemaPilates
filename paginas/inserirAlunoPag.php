<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="../estilo/styles.css">
</head>
<body>
    <h1>Cadastrar Novo Aluno</h1>
    <form action="../cadastroAluno/inserirAluno.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" required><br><br>

        <label for="genero">Gênero:</label>
        <select name="genero" required>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="outro">Outro</option>
        </select><br><br>

        <label for="turma_id">ID da Turma:</label>
        <input type="number" name="turma_id" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>

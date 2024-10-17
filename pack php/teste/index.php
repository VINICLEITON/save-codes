<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Nome, Cidade e Estado</title>
</head>
<body>
    <h1>Cadastro de Nome, Cidade e Estado</h1>

    <?php
    // Lista de nomes, cidades e estados
    $nomes = ["Ana", "Bruno", "Carlos", "Daniela", "Eduardo", "Fernanda", "Gustavo", "Helena", "Igor", "Joana"];
    $cidades = [
        "São Paulo", "Rio de Janeiro", "Belo Horizonte", "Salvador", "Fortaleza", 
        "Brasília", "Curitiba", "Manaus", "Recife", "Porto Alegre",
        "Goiânia", "Belém", "São Luís", "Natal", "Maceió"
    ];
    $estados = [
        "AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA",
        "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN",
        "RS", "RO", "RR", "SC", "SP", "SE", "TO"
    ];

    // Inicializa a lista de cadastros
    session_start();
    if (!isset($_SESSION['cadastros'])) {
        $_SESSION['cadastros'] = [];
    }

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];

        // Adiciona o novo cadastro na lista de cadastros
        $_SESSION['cadastros'][] = [
            'nome' => $nome,
            'cidade' => $cidade,
            'estado' => $estado
        ];
    }
    ?>

    <!-- Formulário de cadastro -->
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <select name="nome" id="nome">
            <?php foreach ($nomes as $nome): ?>
                <option value="<?= $nome ?>"><?= $nome ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="cidade">Cidade:</label>
        <select name="cidade" id="cidade">
            <?php foreach ($cidades as $cidade): ?>
                <option value="<?= $cidade ?>"><?= $cidade ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
            <?php foreach ($estados as $estado): ?>
                <option value="<?= $estado ?>"><?= $estado ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <!-- Exibição dos cadastros -->
    <h2>Cadastros Realizados:</h2>
    <ul>
        <?php foreach ($_SESSION['cadastros'] as $cadastro): ?>
            <li><?= $cadastro['nome'] ?> - <?= $cadastro['cidade'] ?> - <?= $cadastro['estado'] ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

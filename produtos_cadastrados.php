<?php include 'php_crud/config.php'; ?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Inventário de Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Inventário de Produtos</h2>
        <a href="index.php" class="btn btn-primary mb-3">Voltar para Cadastro</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta SQL para selecionar os produtos e o nome da categoria
                $sql = "SELECT p.*, c.nome AS nome_categoria
                        FROM produtos p
                        INNER JOIN categorias c ON p.categoria = c.id"; 

                // Prepara a consulta
                $stmt = $conn->prepare($sql);

                // Executa a consulta
                $stmt->execute();

                // Busca todos os resultados da consulta
                $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Verifica se há resultados
                if (count($produtos) > 0) {
                    // Loop para exibir cada produto na tabela
                    foreach ($produtos as $row) { 
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["descricao"] . "</td>";
                        echo "<td>" . $row["preco"] . "</td>";
                        echo "<td>" . $row["quantidade"] . "</td>";
                        echo "<td>" . $row["nome_categoria"] . "</td>"; // Exibe o nome da categoria
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhum produto cadastrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
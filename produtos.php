<?php 
include 'php_crud/config.php'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Inventário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Inventário de Produtos</h2>
        <a href="index.php" class="btn btn-primary mb-3">Voltar para Cadastro</a>
        <?php
        $sql = "SELECT p.id, p.nome, p.descricao, p.preco, p.quantidade, c.nome AS categoria 
                FROM produtos p
                INNER JOIN categorias c ON p.categoria = c.id";
        $result = $conn->query($sql);

        if ($result->rowCount() > 0) {
            echo '<table class="table table-bordered">';
            echo '<tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Preço</th><th>Quantidade</th><th>Categoria</th><th>Ação</th></tr>';
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["nome"] . '</td>';
                echo '<td>' . $row["descricao"] . '</td>';
                echo '<td>' . $row["preco"] . '</td>';
                echo '<td>' . $row["quantidade"] . '</td>';
                echo '<td>' . $row["categoria"] . '</td>';
                echo '<td>';
                echo '<a href="produtos/update.php?id=' . $row["id"] . '" class="btn btn-success btn-sm">Editar</a> ';
                echo '<a href="produtos/delete.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm">Excluir</a>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "0 resultados"; 
        }
        ?>
    </div>
</body>
</html>
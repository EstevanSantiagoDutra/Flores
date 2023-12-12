<?php
// Configurações do banco de dados
$host = 'root';
$usuario = 'username';
$senha = '';
$bancoDados = 'loja_flores';

// Conexão com o MySQL
$conexao = new mysqli($host, $usuario, $senha, $bancoDados);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Erro de Conexão: " . $conexao->connect_error);
}

// Query para obter os dados dos itens
$query = "SELECT * FROM itens";
$resultado = $conexao->query($query);

// Verifica se há resultados
if ($resultado->num_rows > 0) {
    // Loop através dos resultados e exibição dos valores
    while ($linha = $resultado->fetch_assoc()) {
        echo "ID: " . $linha['id'] . ", Nome: " . $linha['nome'] . ", Preço: R$ " . number_format($linha['preco'], 2) . "<br>";
    }
} else {
    echo "Nenhum item encontrado.";
}

// Fecha a conexão
$conexao->close();
?>

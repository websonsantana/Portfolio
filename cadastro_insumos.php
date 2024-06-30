<?php
// Conexão com o banco de dados (substitua os valores pelos seus dados)
$conexao = new mysqli('localhost', 'usuario', 'senha', 'nomedobanco');
if ($conexao->connect_error) {
    die('Erro de conexão: ' . $conexao->connect_error);
}

// Recuperar os dados do formulário
$produto = $_POST['cadastro-produto'];
$unidade = $_POST['cadastro-unidade'];
$data = $_POST['cadastro-validade'];
$filial = $_POST['cadastro-filial'];
$validade = $_POST['cadastro-validade'];
$estoque = $_POST['cadastro-estoque'];

// Inserir os dados na tabela
$sql = "INSERT INTO insumos (produto, unidade, data, filial, validade, estoque) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param('sssssi', $produto, $unidade, $data, $filial, $validade, $estoque);
if ($stmt->execute()) {
    echo 'Dados cadastrados com sucesso.';
} else {
    echo 'Erro ao cadastrar os dados: ' . $conexao->error;
}

// Fechar conexão
$conexao->close();
?>

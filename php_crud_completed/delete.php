<?php
require_once './database/conexao.php';

$idProduto = $_POST['id'] ?? null;

if (!$_POST['id']) {
    header('location: index.php');
    exit;
}

$statement = $pdo->prepare("DELETE FROM produto WHERE id = :id");
$statement->bindValue(':id', $idProduto);
$statement->execute();

header('location: index.php');

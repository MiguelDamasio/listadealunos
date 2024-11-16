<?php

$conn = new mysqli('localhost', 'root', '', 'gestao_alunos');

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM alunos WHERE id = ?");
    $stmt->bind_param("i", $id);  

    if ($stmt->execute()) {

        header('Location: index.php');
        exit();
    } else {
        echo "Erro ao eliminar o registo: " . $stmt->error;
    }

    $stmt->close();
} else {

    header('Location: index.php');
    exit();
}

$conn->close();
?>

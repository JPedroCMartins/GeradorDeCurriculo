<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $servidor = "localhost";
    $banco = "curriculos2024";
    $usuario = "root";
    $senha = "";

    $conn = new mysqli($servidor, $usuario, $senha, $banco);
    if ($conn->connect_errno) {
        die("Falha ao conectar: " . $conn->connect_errno);
    }

    $sql = "SELECT * FROM auth WHERE login = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['passwd'] == $password) {
            // Redirecionar para o Google
            header('Location: https://localhost/GeradorDeCurriculo');
            exit();
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
?>

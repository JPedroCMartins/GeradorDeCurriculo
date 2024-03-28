<?php
    $servidor = "192.168.0.191";
    $banco = "curriculos2024";
    $usuario = "root";
    $senha = "";

    $conn = new mysqli($servidor, $usuario, $senha, $banco);
    if ($conn -> connect_errno) {
        die("Falha ao conectar: ".$conn->connect_errno);
    }

?>
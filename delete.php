<?php
    $codigo = $_GET["codigo"];
    include("conexao.php");

    $sql = "DELETE cliente, curso_complementar, experiencia
    FROM cliente
    LEFT JOIN curso_complementar ON cliente.clienteCodigo = curso_complementar.cursoClienteCodigo
    LEFT JOIN experiencia ON cliente.clienteCodigo = experiencia.experienciaClienteCodigo
    WHERE cliente.clienteCodigo = $codigo";

    
    
    $res = mysqli_query($conn, $sql);
    
    echo '<script> 
        alert("cliente deletado com sucesso")
        window.location="index.php";
        </script>';
?>
<?php
    $clienteDocumentacaoCompleta = 1;
    $clienteNome = $_POST["nome"];
    $clienteEmail = $_POST["email"];
    $clienteNascimento = $_POST["data_nascimento"];
    $clienteEndereco = $_POST["endereco"];
    $clienteTelefone = $_POST["telefone"];
    $clienteObjetivo = $_POST["areaObjetivo"];
    $clienteEscolaridade = $_POST["educacao"];

    $experienciaInicio = "TEST";
    $experienciaFim = "TEST";

    $enviar = $_POST["enviar"];
    include("conexao.php");
    if(isset($enviar)){
        $queryInserir = "INSERT INTO cliente(clienteDocumentacaoCompleta, clienteNome, clienteEmail, clienteNascimento, clienteEndereco, clienteTelefone, clienteObjetivo, clienteEscolaridade) VALUES (
            '$clienteDocumentacaoCompleta', 
            '$clienteNome',
            '$clienteEmail',
            '$clienteNascimento',
            '$clienteEndereco',
            '$clienteTelefone',
            '$clienteObjetivo',
            '$clienteEscolaridade'
        )";

        $resultadoInserir = mysqli_query($conn, $queryInserir);

        if ($resultadoInserir){
            $querySelecionar = "SELECT clienteCodigo FROM cliente WHERE clienteNome = '$clienteNome'";
            $resultadoSelecionar = mysqli_query($conn, $querySelecionar);
            if ($resultadoSelecionar){
                $row = mysqli_fetch_assoc($resultadoSelecionar);
                $clienteCodigo = $row['clienteCodigo'];

                for ($i = 1; $i <= 20; $i++) {
                    $experienciaCargo = $_POST["cargo$i"];
                    $experienciaEmpresa = $_POST["empresa$i"];


                    // Verificar se cargo e empresa foram preenchidos
                    if (!empty($experienciaCargo) && !empty($experienciaEmpresa)) {
                        $queryInserirExperiencia = "INSERT INTO experiencia(experienciaClienteCodigo, experienciaInicio, experienciaFim ,experienciaCargo, experienciaEmpresa) VALUES (
                            '$clienteCodigo',
                            '$experienciaInicio',
                            '$experienciaFim',
                            '$experienciaCargo',
                            '$experienciaEmpresa'
                        )";
                        $resultadoInserirExperiencia = mysqli_query($conn, $queryInserirExperiencia);
                        
                        // Verificar se a inserção da experiência foi bem sucedida
                        if (!$resultadoInserirExperiencia) {
                            echo "Erro ao inserir experiência profissional: " . mysqli_error($conn);
                        }
                    }
                }

            }else {
                echo "Erro ao selecionar o código do cliente: " . mysqli_error($conn);
            }
        }else {
            echo "Erro ao inserir cliente: " . mysqli_error($conn);
        }




        echo '<script> 
        alert("cliente adicionado com sucesso")
        window.location="index.php";
        </script>';

    }

?>
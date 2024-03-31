<?php
    $clienteDocumentacaoCompleta = 1;
    $clienteNome = $_POST["nome"];
    $clienteEmail = $_POST["email"];
    $data = $_POST["data_nascimento"];
    $clienteNascimento = date('d/m/Y', strtotime($data));
    $clienteEndereco = $_POST["endereco"];
    $clienteTelefone = $_POST["telefone"];
    $clienteObjetivo = $_POST["areaObjetivo"];
    $clienteEscolaridade = $_POST["educacao"];



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

                for ($i = 0; $i <= 20; $i++) {
                    $experienciaCargo = $_POST["cargo$i"];
                    $experienciaEmpresa = $_POST["empresa$i"];
                    $experienciaInicio = $_POST["inicio$i"];
                    $experienciaFim = $_POST["fim$i"];

                    $cursoInicio = $_POST["complement_education_inicio$i"];
                    $cursoFim = $_POST["complement_education_fim$i"];
                    $cursoNome = $_POST["complement_education_nome$i"];
                    $cursoInstituicao = $_POST["complement_education_inst$i"];

                    if (!empty($experienciaCargo) && !empty($experienciaEmpresa)) {
                        $queryInserirExperiencia = "INSERT INTO experiencia(experienciaClienteCodigo, experienciaInicio, experienciaFim ,experienciaCargo, experienciaEmpresa) VALUES (
                            '$clienteCodigo',
                            '$experienciaInicio',
                            '$experienciaFim',
                            '$experienciaCargo',
                            '$experienciaEmpresa'
                        )";
                        $resultadoInserirExperiencia = mysqli_query($conn, $queryInserirExperiencia);
                        
                        if (!$resultadoInserirExperiencia) {
                            echo "Erro ao inserir experiência profissional: " . mysqli_error($conn);
                        }
                    }

                    if (!empty($cursoNome)) {
                        $queryInserirCurso = "INSERT INTO curso_complementar(cursoClienteCodigo, cursoInicio, cursoFim, cursoNome, cursoInstituicao) VALUES (
                            '$clienteCodigo',
                            '$cursoInicio',
                            '$cursoFim',
                            '$cursoNome',
                            '$cursoInstituicao'
                        )";
                        $resultadoInserirCurso = mysqli_query($conn, $queryInserirCurso);
                        
                        if (!$resultadoInserirCurso) {
                            echo "Erro ao inserir curso complementar: " . mysqli_error($conn);
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
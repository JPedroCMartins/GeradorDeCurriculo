<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            -webkit-print-color-adjust: exact;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }

        header {
            text-align: center;

        }

        .head-topic {
            background: rgb(204, 204, 204);
            border-bottom: 1px solid black;
        }

        footer {
            font-family: "arial black";
            text-align: center;
            width: 100%;
            height: 100px;
            position: absolute;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
    <?php
        $codigo = $_GET["codigo"];
        include("conexao.php");

        $queryCliente = "SELECT * FROM cliente WHERE clienteCodigo = '$codigo'";

        $resultadoCliente = mysqli_query($conn, $queryCliente);
        while($row = $resultadoCliente->fetch_assoc()) {
            $clienteDocumentacaoCompleta = $row["clienteDocumentacaoCompleta"];
            $clienteNome = $row["clienteNome"];
            $clienteEmail = $row["clienteEmail"];
            $clienteNascimento = $row["clienteNascimento"];
            $clienteEndereco = $row["clienteEndereco"];
            $clienteTelefone = $row["clienteTelefone"];
            $clienteObjetivo = $row["clienteObjetivo"];
            $clienteEscolaridade = $row["clienteEscolaridade"];
  
        }

        $queryExperiencia = "SELECT * FROM experiencia WHERE experienciaClienteCodigo = '$codigo'";

        $resultadoExperiencia = mysqli_query($conn, $queryExperiencia);

        $experiencias = array();

        while ($row = mysqli_fetch_assoc($resultadoExperiencia)) {
            $experiencias[] = array(
                "inicio" => $row["experienciaInicio"],
                "fim" => $row["experienciaFim"],
                "empresa" => $row["experienciaEmpresa"],
                "cargo" => $row["experienciaCargo"]
            );
        }
        
        $queryCurso = "SELECT * FROM curso_complementar WHERE cursoClienteCodigo = '$codigo'";

        $resultadoCurso = mysqli_query($conn, $queryCurso);
        /*
        while($row = $resultadoCurso->fetch_assoc()) {
            $cursoInicio = $row["cursoInicio"];
            $cursoFim = $row["cursoFim"];
            $cursoNome = $row["cursoNome"];
            $cursoInstituicao = $row["cursoInstituicao"];
        }
        */

         // Verifica se há resultados
        $cursos = array();

        // Itera sobre cada linha de resultado e armazena as experiências no array
        while ($row = mysqli_fetch_assoc($resultadoCurso)) {
            $cursos[] = array(
                "inicio" => $row["cursoInicio"],
                "fim" => $row["cursoFim"],
                "nome" => $row["cursoNome"],
                "instituicao" => $row["cursoInstituicao"]
            );
        }

    ?>
    <header id="header-name">
        <h1>
            <?php echo $clienteNome ?>
        </h1>
    </header>

    <div id="dados_pessoais">
        <h2 class="head-topic"> DADOS PESSOAIS</h2>

        <i class="fa-solid fa-check"></i> <strong>Data de nascimento:</strong> 
        <?php echo $clienteNascimento; ?>
        <br>

        <i class="fa-solid fa-check"></i> <strong>Endereço:</strong> 
        <?php echo $clienteEndereco; ?>
        <br>

        <i class="fa-solid fa-check"></i> <strong>Telefone:</strong> 
        <?php echo $clienteTelefone; ?>
        <br>


        
        <?php 
            if (!empty($clienteEmail)){
                ?>
                <i class="fa-solid fa-check"></i> <strong>Email:</strong> 
                <?php
                echo $clienteEmail;
            } 
        ?>

        <br>
    </div>

    <div id="objetivo">
        <h2 class="head-topic">OBJETIVO</h2>
        <p style="text-align: justify;">
            <?php
            if (empty($clienteObjetivo)){
                echo "Busco uma oportunidade para aplicar e desenvolver minhas habilidades em um ambiente dinâmico e desafiador, onde eu possa contribuir de forma significativa para o crescimento e sucesso da organização. Estou comprometido em aprender e crescer profissionalmente, enquanto colaboro com uma equipe dedicada e motivada, visando alcançar os objetivos da empresa e superar as expectativas dos clientes. Minha paixão pelo trabalho em equipe, minha capacidade de adaptação e minha vontade de enfrentar novos desafios me capacitam a contribuir de forma positiva em diversos contextos profissionais.";
            }else{
                echo $clienteObjetivo;
            }
            ?>
        </p>
    </div>

    <div id="documentacao">
        <h2 class="head-topic">DOCUMENTAÇÃO</h2>
        <?php
        if ($clienteDocumentacaoCompleta){
            ?>
            <i class="fa-solid fa-check"></i>Completa e Atualizada
            <?php
        }else{
            ?>
            <i class="fa-solid fa-check"></i>Incompleta.
            <?php
        }?> 
    </div>

    <div id="escolaridade_cursos">
        <h2 class="head-topic">ESCOLARIDADE E CURSOS COMPLEMENTARES</h2>
        <i class="fa-solid fa-check"></i>
        <?php echo $clienteEscolaridade; ?>
        
        <?php 
            foreach ($cursos as $curso) {
                echo '<p><i class="fa-solid fa-check"></i> ' . $curso['nome'] . '</p>';
            }
        ?>
    </div>

    <div id="experiencia">
        <h2 class="head-topic">EXPERIENCIA PROFISSIONAL</h2>
        <?php 
         foreach ($experiencias as $experiencia) {
            echo '<p><i class="fa-solid fa-check"></i><strong>Empresa: </strong> ' . $experiencia['empresa'];
            echo '<br>';
            echo '<i class="fa-solid fa-check"></i><strong>Cargo: </strong> ' . $experiencia['cargo'] . '</p>';
        }
        ?> 
        <footer>
            Manaus, AM<br>2024
        </footer>
    </div>
    <script>
        
    </script>
</body>
</html>
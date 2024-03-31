<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>curriculo</title>
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
    <header id="header-name">
        <h1>
            <?php echo htmlspecialchars($_POST['name']); ?>
        </h1>
    </header>

    <div id="dados_pessoais">
        <h2 class="head-topic"> DADOS PESSOAIS</h2>

        <i class="fa-solid fa-check"></i> <strong>ano de nascimento:</strong> 
        <?php echo htmlspecialchars($_POST['age']); ?>
        <br>

        <i class="fa-solid fa-check"></i> <strong>Endereço:</strong> 
        <?php echo htmlspecialchars($_POST['local']); ?>
        <br>

        <i class="fa-solid fa-check"></i> <strong>Telefone:</strong> 
        <?php echo htmlspecialchars($_POST['phone']); ?>
        <br>
        <i class="fa-solid fa-check"></i> <strong>Email:</strong> 
        <?php echo htmlspecialchars($_POST['mail']); ?>
        <br>
    </div>
    <div id="objetivo">
        <h2 class="head-topic">OBJETIVO</h2>
        <p style="text-align: justify;">
            <?php
            if (isset($_POST['radio']) && $_POST['radio'] == "yes"){
                echo "Busco uma oportunidade para aplicar e desenvolver minhas habilidades em um ambiente dinâmico e desafiador, onde eu possa contribuir de forma significativa para o crescimento e sucesso da organização. Estou comprometido em aprender e crescer profissionalmente, enquanto colaboro com uma equipe dedicada e motivada, visando alcançar os objetivos da empresa e superar as expectativas dos clientes. Minha paixão pelo trabalho em equipe, minha capacidade de adaptação e minha vontade de enfrentar novos desafios me capacitam a contribuir de forma positiva em diversos contextos profissionais.";
            }else{
                echo htmlspecialchars($_POST['objetivo']);
            }
            ?>
        </p>
    </div>
    <div id="documentacao">
        <h2 class="head-topic">DOCUMENTAÇÃO</h2>
        <i class="fa-solid fa-check"></i>Completa e Atualizada
    </div>
    <div id="escolaridade_cursos">
        <h2 class="head-topic">ESCOLARIDADE E CURSOS COMPLEMENTARES</h2>
        <i class="fa-solid fa-check"></i>


        <?php echo htmlspecialchars($_POST['education']); ?>
        <?php 
        if (isset($_POST['radio']) && $_POST['radio'] == "yes") {
            for ($i = 1; $i <= 5; $i++) {
                if(empty($_POST['complement_education' . $i]) ){
                    break;
                }
                ?>
                <br><i class="fa-solid fa-check"></i> 
                <?php
                echo htmlspecialchars($_POST['complement_education' . $i]); 
            }
        }
        ?>
       
    </div>

    <div id="experiencia">
        <h2 class="head-topic">EXPERIENCIA PROFISSIONAL</h2>
        <?php 
            if (isset($_POST['radio_profissional']) && $_POST['radio_profissional'] == "yes"){

                for ($i = 1; $i <= 6; $i++) {
                    if(empty($_POST['empresa' . $i]) ){
                        break;
                    }
                    ?>
                    
                    <strong>Empresa: </strong>
                    
                    <?php
                    echo htmlspecialchars($_POST['empresa' . $i]);
                    ?>
                    <br>
                    <strong>Cargo: </strong>
                    <?php
                    echo htmlspecialchars($_POST['cargo' . $i]);
                    ?>
                    <br>
                    <?php
                }

            }else{
                ?>
                Em Busca do primeiro emprego...
                <?php
            }
        ?> 
    </div>
    <div id="adicional">

    </div>
    <section>

    </section>
    <footer>
        Manaus, AM<br>2024
    </footer>
</body>
<script src="script.js"></script>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículo</title>
    <!-- Adicione a CDN do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos adicionais */
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Gerador de Currículo</a>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col text-center">
                <h1>Gerador de Currículo</h1>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <button class="btn btn-primary btn-lg mr-2" onclick='redirect(1)'>Gerar Currículo</button>
                <button class="btn btn-secondary btn-lg ml-2" onclick='redirect(2)'>Database</button>
            </div>
        </div>
        <div class="row mt-5">
            <?php
                // Estabelecer conexão com o banco de dados
                include("conexao.php");

                // Consulta SQL para selecionar todas as experiências profissionais
                $query = "SELECT clienteCodigo, clienteNome, clienteEmail FROM cliente ORDER BY clienteCodigo DESC";

                // Executar a consulta
                $result = mysqli_query($conn, $query);

                // Verificar se há resultados
                if (mysqli_num_rows($result) > 0) {
                    // Exibir os resultados em uma tabela HTML
                    echo "<table border='1' class='table table-dark'>";
                    echo "<tr><th>Código</th><th>Nome</th><th>Email</th><th>Curriculo</th><th>Opção</th></tr>";

                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["clienteCodigo"] . "</td>";
                        echo "<td>" . $row["clienteNome"] . "</td>";
                        if (empty($row["clienteEmail"])){
                            echo "<td style='color: yellow;'> SEM EMAIL</td>";
                        }else{
                            echo "<td>" . $row["clienteEmail"] . "</td>";
                        }
                        
                        echo "<td><a href='curriculo.php?codigo=" . $row["clienteCodigo"] . "' onclick='abrirPaginaEImprimir(this.href); return false;'>Exibir (para impressão)</a></td>";
                        echo "<td><a href='delete.php?codigo=". $row["clienteCodigo"] . "'> Apagar </a> | <a href=''> Editar <a></td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "Nenhum resultado encontrado.";
                }

                // Fechar conexão com o banco de dados
                mysqli_close($conn);
            ?>
        </div>
    </div>
    <div class=" container mt-5" id="erro">
    </div>

    <footer>
        <div class="container">
            <p class="text-center">© JPedroCMartins</p>
        </div>
    </footer>

    <!-- Adicione a biblioteca jQuery e o Bootstrap JS no final do corpo do documento para melhorar o carregamento da página -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var erro = document.getElementById("erro")
        function redirect(gerar) {
            if (gerar == 1) {
                <?php
                    echo 'window.open("http://'.$servidor.'/GeradorDeCurriculo/gerador.html", "_blank");'
                ?>
            }
            if (gerar == 2) {
                <?php
                    echo 'window.open("http://'.$servidor.'/phpmyadmin/index.php?route=/database/structure&db=curriculos2024");'
                ?>
            }
        }

        function abrirPaginaEImprimir(url) {
            // Abre a página vinculada ao link em uma nova janela
            var novaJanela = window.open(url);
            
            // Aguarda um curto período para garantir que a nova janela seja carregada
            setTimeout(function() {
                // Se a nova janela foi aberta corretamente
                if (novaJanela) {
                    // Inicia a janela de impressão na nova janela
                    novaJanela.print();
                    setTimeout(function(){
                        novaJanela.close();
                    }, 2000)
                } else {
                    // Caso contrário, avisa o usuário que a janela pop-up está bloqueada
                    alert('Pop-up bloqueado. Por favor, habilite os pop-ups para imprimir.');
                    
                }
            }, 1000); // Espera 1 segundo (1000 milissegundos) para a janela ser aberta
        }


    </script>
</body>

</html>
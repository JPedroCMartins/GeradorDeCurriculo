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
        <div class="row mt-3">
            <div class="col text-center">
                <button class="btn btn-primary btn-lg mr-2" onclick='redirect(1)'>Gerar Currículo</button>
                <button class="btn btn-secondary btn-lg ml-2" onclick='redirect(2)'>Pesquisar</button>
            </div>
        </div>
    </div>
    <div class=" container mt-5" id="erro">
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
                echo "<table border='1' class='table'>";
                echo "<tr><th>Código</th><th>Nome</th><th>Email</th></tr>";

                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["clienteCodigo"] . "</td>";
                    echo "<td>" . $row["clienteNome"] . "</td>";
                    echo "<td>" . $row["clienteEmail"] . "</td>";
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
                window.open("http://192.168.191/GeradorDeCurriculo/gerador.html", "_blank");
            }
            if (gerar == 2) {
                erro.innerHTML = '<div class="row"><div class="col text-center"><h3 style="color: red;">Erro: Sistema de pesquisa ainda não funcional</h3></div></div>'

            }
        }
    </script>
</body>

</html>
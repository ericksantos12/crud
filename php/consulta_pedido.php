<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/icon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>Liloca Personalizados</title>
</head>
<body class="">

    <header>
        <div class="flex justify-center mt-5">
            <img src="../img/LILOCA.png">
        </div>
        <div class="bg-green-700 shadow-lg mt-5 mb-9 mx-10 md:mx-32 xl:mx-64 2xl:mx-96 p-2 no-underline">
            <nav>
                <li class="flex justify-center md:justify-start">
                    <ul class="mx-3 p-1 md:p-0">
                        <a href="../Cadastro.html" class="font-bold text-xl p-2 md:text-base md:p-1 text-white hover:text-gray-300">Cliente</a>
                    </ul>
                    <ul class="mx-3 p-1 md:p-0">
                        <a href="../Festa.html" class="font-bold text-xl p-2 md:text-base md:p-1 text-white hover:text-gray-300">Festa</a>
                    </ul>
                    <ul class="mx-3 p-1 md:p-0">
                        <a href="../Pedido.html" class="font-bold text-xl p-2 md:text-base md:p-1 text-white hover:text-gray-300">Pedido</a>
                    </ul>
                </li>
            </nav>
        </div>
    </header>

    <main>

        <div class="bg-gray-100 xl:mx-64 p-6 shadow-lg">

            <h1 class="font-bold mb-10 text-center text-3xl">Dados da Consulta</h1>
            <h2 class="font-bold mb-5 text-center text-2xl">Pedido</h1>

            <table class="min-w-full border-collapse border shadow-sm table-auto text-center">
                <thead class="border">
                    <tr>
                        <th>Aniversariante</th>
                        <th>Data Pedido</th>
                        <th>Tipo</th>
                        <th>Endereço</th>
                        <th>Prazo</th>
                        <th>Frete</th>
                        <th>Sinal</th>
                        <th>Restante</th>
                        <th>Data de Entrega</th>
                        <th>total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    try {
                    
                        require "conectaBD.php";
                        require "utils.php";

                        $pedido = $_POST['pedido'];
                        
                        mostrarTabela($conn, "CALL `Consultar_Pedido`(?);", [$pedido]);
                        
                    } catch (PDOException $e) {
                        echo "Erro: " . $e;
                    }
                    
                    ?>
                
                </tbody>
            </table>

            <h2 class="font-bold mt-10 mb-5 text-center text-2xl">Produtos</h1>
            <table class="min-w-full border-collapse border shadow-sm table-auto text-center">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            try {
                                mostrarTabela($conn, "CALL `Consultar_PedidoProduto`(?);", [$pedido]);
                            } catch (PDOException $e) {
                                echo "Erro: " . $e;
                            }
                        ?>
                    </tbody>
            </table>
        </div>
    </main>
</body>
</html>
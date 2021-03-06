<?php
    include ('../view/template/cabecalho.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>
    <!-- FrameWork TailWind -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- Script(alpinejs, jquery) -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

    <!-- Máscaras de input -->
    <script>
        $(document).ready(function () {
            $("#cpf").mask('000.000.000-00');
            $('#telefone').mask('(00) 00000-0000');
        });
    </script>
</head>

<body class="bg-gradient-to-r from-blue-500 to-green-500">
<!-- Alerta! -->
<div class="alert" id="alert" role="alert"></div>
<div class="h-screen w-screen">
    <div class="flex flex-col items-center flex-1 h-full justify-center px-1 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
            <div class="flex flex-col w-full md:w-1/2">
                <div class="flex flex-col flex-1 justify-center mb-8 pt-1">
                    <h1 class="text-4xl text-center font-medium">Cadastrar</h1>
                    <div class="w-full">
                        <!-- Formulário -->
                        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="../controller/create.php">
                            <!-- Nome -->
                            <div class="flex flex-col mt-4">
                                <input type="text" id="nome" class="flex-grow h-8 px-2 border rounded border-grey-400"
                                       name="nome" value="" placeholder="Nome" required>
                            </div>
                            <!-- Data de Nascimento -->
                            <div class="flex flex-col mt-4">
                                <input type="date" id="nascimento" class="flex-grow h-8 px-2 border rounded
                                border-grey-400" name="nascimento" value="" placeholder="Data Nascimento" required>
                            </div>
                            <!-- Cpf com Máscara -->
                            <div class="flex flex-col mt-4">
                                <input type="text" id="cpf" class="flex-grow h-8 px-2 border rounded border-grey-400"
                                       name="cpf" value="" placeholder="CPF" minlength="14" required>
                            </div>
                            <!-- Telefone com Máscara -->
                            <div class="flex flex-col mt-4">
                                <input type="text" id="telefone" class="flex-grow h-8 px-2 border rounded border-grey-400"
                                       name="telefone" value="" placeholder="Telefone" required>
                            </div>
                            <!-- Email -->
                            <div class="flex flex-col mt-4">
                                <input type="email" id="email" class="flex-grow h-8 px-2 border rounded
                                border-grey-400" name="email" value="" placeholder="Email" required>
                            </div>
                            <!-- Endereço -->
                            <div class="flex flex-col mt-4">
                                <input type="text" id="endereco" class="flex-grow h-8 px-2 border rounded
                                border-grey-400" name="endereco" value="" placeholder="Endereço" required>
                            </div>
                            <!-- Observação -->
                            <div class="flex flex-col mt-4">
                                <textarea id="observacao" class="flex-grow h-8 px-2 border rounded border-grey-400"
                                          name="observacao" value="" placeholder="Observação" max="300"></textarea>
                            </div>
                            <!-- Cadastrar -->
                            <div class="flex flex-col mt-6">
                                <button id="submit" class="bg-blue-500 hover:bg-blue-600 text-white
                                text-sm font-semibold py-2 px-4 rounded">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <img class="hidden md:block md:w-1/2 rounded-r-lg" src="img/logoNewM.png">
        </div>
    </div>
</div>
</body>
</html>

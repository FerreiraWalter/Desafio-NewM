<?php
    include ('../view/template/cabecalho.php');
    require_once '../model/User.php';

    $p = new User('localhost', 'cadastronewm', 'root', '');

    //Busca por todos os usuários cadastrados
    $array = $p->listarDados();

    //Busca pelo nome digitado
    if(isset($_POST['search'])) {
        $nomeDigitado = $_POST['search'];
        if(!empty($nomeDigitado)) {
            $array = $p->encontrarUsuario($nomeDigitado);
        }
    }

?>

<!DOCTYPE HTML>
<html lang=”pt-br”>
<head>
    <meta charset=”UTF-8”>
    <title>Editar</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-500 to-green-500">

<!-- Barra de procura  -->
<form method="post" action="">
    <div class="grid justify-items-center text-gray-600 pt-10 pb-6">
        <input type="search" name="search" placeholder="Nome para busca" class="bg-white h-10 px-5 pr-10
        rounded-full text-sm
    focus:outline-none">
        <button class="bg-blue-500 text-white p-5 rounded-full py-3 px-6 hover:bg-blue-400 focus:outline-none w-15
        h-12 flex items-center justify-center">Pesquisar</button>
    </div>
</form>

<div class="w-2/3 mx-auto">
    <div class="bg-white shadow-md rounded my-6">
        <table class="text-left w-full border-collapse">
            <thead>
            <tr class="bg-indigo-400 text-white">
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nome</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Email</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-bborder-grey-100">Telefone</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Ações</th>
            </tr>
            </thead>
            <tbody>
            <!-- Listagem das pessoas Cadastradas  -->
            <?php foreach($array as $value): ?>
                    <tr class="hover:bg-grey-200">
                        <td class="py-4 px-6 border-b border-grey-light"><?php echo $value['nome'] ?></td>
                        <td class="py-4 px-6 border-b border-grey-light"><?php echo $value['email']?></td>
                        <td class="py-4 px-6 border-b border-grey-light"><?php echo $value['telefone']?></td>
                        <td class="py-4 px-6 border-b border-grey-light text-white">
                            <a href="../controller/update.php?id=<?php echo $value['id'] ?>" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue-400
                            hover:bg-blue-600">Editar</a>
                            <a href="../controller/delete.php?id=<?php echo $value['id'] ?>" class="text-grey-lighter
                            font-bold py-1
                            px-3 rounded text-xs bg-red-400 hover:bg-red-600">Deletar</a>
                        </td>
                    </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>


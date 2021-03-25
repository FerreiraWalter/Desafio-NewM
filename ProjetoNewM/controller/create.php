<?php
require '../model/User.php';

$p = new User('localhost', 'cadastronewm', 'root', '');

//Cadastro de usuários
if(isset($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $nascimento= addslashes($_POST['nascimento']);
    $telefone = addslashes($_POST['telefone']);
    $cpf = addslashes($_POST['cpf']);
    $email = addslashes($_POST['email']);
    $endereco = addslashes($_POST['endereco']);
    $obs = addslashes($_POST['observacao']);

    if($p->validacaoCpf($cpf) && $p->validarNome($nome)) {
        $p->cadastrarPessoa($nome, $nascimento, $telefone, $cpf, $email, $endereco, $obs);
        header('Location: ../view/main.php');
    }
}

?>

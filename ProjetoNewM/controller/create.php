<?php
require '../model/User.php';

$p = new User('localhost', 'cadastronewm', 'root', '');

if(isset($_POST['nome'])) {
    $data = [
        $nome = addslashes($_POST['nome']),
        $nascimento= addslashes($_POST['nascimento']),
        $telefone = addslashes($_POST['telefone']),
        $cpf = addslashes($_POST['cpf']),
        $email = addslashes($_POST['email']),
        $endereco = addslashes($_POST['endereco']),
        $obs = addslashes($_POST['observacao'])
        ];

    if($p->validacaoCpf($cpf) && $p->validarNome($nome)) {
        $p->cadastrarPessoa($nome, $nascimento, $telefone, $cpf, $email, $endereco, $obs);
        echo 'Cadastro feito com sucesso';
        header('Location: ../view/main.php');
    } else {
        echo 'ERRO AO CADASTRAR NO BANCO DE DADOS';
    }
}

?>

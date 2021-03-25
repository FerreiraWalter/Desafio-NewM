<?php
require_once '../model/User.php';

$p = new User('localhost', 'cadastronewm', 'root', '');

//Verificar se o ID existe, após isso ele deleta o usuário específico
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $p->deletarUsuario($id);
}

?>

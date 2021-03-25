<?php
Class User {
    private $pdo;

    public function __construct($host, $dbname, $user, $senha) { //Conectar o aplicativo ao banco de dados
        try{
            $this->pdo = new PDO("mysql:host=".$host.";dbname=".$dbname, "$user", "$senha");
        } catch (PDOException $e) {
            echo 'ERRO: Banco de dados não conectado!';
            exit();
        } catch (Exception $e) {
            echo 'ERRO: genérico';
            exit();
        }
    }

    public function listarDados() { //Listar todos os usuários no banco de dados
        $arr = array();

        $select = $this->pdo->query("SELECT * FROM users");
        $arr = $select->fetchAll(PDO::FETCH_ASSOC);

        return $arr;
    }

    public function encontrarUsuario($nome) { //Filtrar
        $arr = array();

        $select = $this->pdo->query("SELECT * FROM users WHERE nome LIKE '%$nome%'");
        $arr = $select->fetchAll(PDO::FETCH_ASSOC);

        return $arr;
    }

    public function buscarUsuario($id) { //Buscar usuário específico para o UPDATE dele mais tarde
        $arr = array();

        $select = $this->pdo->query("SELECT * FROM users WHERE id=$id");
        $arr = $select->fetchAll(PDO::FETCH_ASSOC);

        return $arr;
    }

    public function deletarUsuario($id) { //Excluir o usuário do banco de dados
        $delete  = $this->pdo->prepare("DELETE FROM users WHERE id=?");
        $delete->execute(array($id));

        header('Location: ../view/main.php');
    }

    public function editarUsuario($nome, $nascimento, $telefone, $cpf, $email, $endereco, $obs, $id) { //Edição do
        // usuário no banco de dados
        $edit = $this->pdo->prepare('UPDATE users SET nome = ?, nascimento = ?, cpf = ?, telefone = ?, email = ?, endereco = ?, obs = ?  WHERE id = ?');
        $edit->execute(array($nome, $nascimento, $cpf, $telefone, $email, $endereco, $obs, $id));

        header('Location: ../view/main.php');
    }

    public function cadastrarPessoa($nome, $nascimento, $telefone, $cpf, $email, $endereco, $obs) { //Cadastro do
        // usuário (com validações)
        //Verificar se já foi cadastrada!
        $selectEmail = $this->pdo->prepare("SELECT id from users WHERE email = ?");
        $selectEmail->execute(array($email));

        $selectTelefone = $this->pdo->prepare("SELECT id from users WHERE telefone = ?");
        $selectTelefone->execute(array($telefone));

        $selecCpf = $this->pdo->prepare("SELECT id from users WHERE cpf = ?");
        $selecCpf->execute(array($cpf));

        if($selectEmail->rowCount() > 0 || $selectTelefone->rowCount() > 0 || $selecCpf->rowCount() > 0) {
            //Email, Telefone, ou Cpf já está cadastrado no banco de dados
            return false;
        } else {
            $select = $this->pdo->prepare("INSERT INTO users(nome, nascimento, telefone, cpf, email, endereco, obs) VALUES(?, ?, ?, ?, ?, ?, ?)");
            $select->execute(array($nome, $nascimento, $telefone, $cpf, $email, $endereco, $obs));
            return true;
        }
    }

    //VALIDAÇÕES

    public function validarNome($nome) { //Verificar se existe algum caractere especial no nome
        if (preg_match('/^[a-zA-Z]+/', $nome)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function validacaoCpf($cpf) { //Verificar se o CPF digitado é válido
        $cpf = preg_replace("/[^0-9]/", "", $cpf);

        $digitoUm = 0;
        $digitoDois = 0;

        for($i = 0, $x = 10; $i <= 8; $i++, $x--) {
            $digitoUm += $cpf[$i] * $x;
        }

        for($i = 0, $x = 11; $i <= 9; $i++, $x--) {
            if(str_repeat($i, 11) == $cpf) {
                return false;
            }
            $digitoDois += $cpf[$i] * $x;
        }

        $calculoUm = (($digitoUm % 11) < 2) ? 0 : 11-($digitoUm % 11);
        $calculoDois = (($digitoDois % 11) < 2) ? 0 : 11-($digitoDois % 11);

        if($calculoUm <> $cpf[9] || $calculoDois <> $cpf[10]) {
            return false;
        }
        return true;

    }

}
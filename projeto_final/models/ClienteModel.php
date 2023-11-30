<?php

require_once "Conexao.php";
require_once "Cliente.php";

class ClienteModel
{

    public $tabela = "clientes";

    public function create(Cliente $c)
    {
        try {
            $sql = "insert into $this->tabela (nome, email, cpf, sexo, data, obs) 
                values (?, ?, ?, ?, ?, ?)";

            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $c->getNome());
            $stmt->bindValue(2, $c->getEmail());
            $stmt->bindValue(3, $c->getCpf());
            $stmt->bindValue(4, $c->getSexo());
            $stmt->bindValue(5, $c->getData());
            $stmt->bindValue(6, $c->getObs());

            return $stmt->execute();
        } catch (PDOException $Exception) {
            // Note The Typecast To An Integer!
            //throw new PDOException($Exception->getMessage(), (int)$Exception->getCode());
            echo "Erro: " . $Exception->getMessage();
            echo "Número: " . (int)$Exception->getCode();
        }
    }
    public function read()
    {
        $stmt = Conexao::getConn()->prepare("select * from $this->tabela");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findId($id)
    {
        $stmt = Conexao::getConn()->prepare("select * from $this->tabela where id=?");
        $stmt->bindValue(1, $id);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update(Cliente $c)
    {
        try {
            $sql = "update $this->tabela set nome=?, email=?, cpf=?, sexo=?, data=?, obs=? where id=?";

            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $c->getNome());
            $stmt->bindValue(2, $c->getEmail());
            $stmt->bindValue(3, $c->getCpf());
            $stmt->bindValue(4, $c->getSexo());
            $stmt->bindValue(5, $c->getData());
            $stmt->bindValue(6, $c->getObs());
            $stmt->bindValue(7, $c->getId());

            return $stmt->execute();
        } catch (PDOException $Exception) {
            // Note The Typecast To An Integer!
            throw new PDOException($Exception->getMessage(), (int)$Exception->getCode());
            echo "Erro: " . $Exception->getMessage();
            echo "Número: " . (int)$Exception->getCode();
        }
    }
    public function delete($id)
    {
        try {
            $sql = "delete from $this->tabela where id=?";

            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $id);

            return $stmt->execute();
        } catch (PDOException $Exception) {
            // Note The Typecast To An Integer!
            throw new PDOException($Exception->getMessage(), (int)$Exception->getCode());
            echo "Erro: " . $Exception->getMessage();
            echo "Número: " . (int)$Exception->getCode();
        }
    }
}

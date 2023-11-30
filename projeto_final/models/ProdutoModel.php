<?php

require_once "Conexao.php";
require_once "Produto.php";

class ProdutoModel
{

    public $tabela = "produtos";

    public function create(Produto $c)
    {
        try {
            $sql = "insert into $this->tabela (nome, valor, codigo, quantidade, descricao, categoria_id) 
                values (?, ?, ?, ?, ?, ?)";

            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $c->getNome());
            $stmt->bindValue(2, $c->getValor());
            $stmt->bindValue(3, $c->getCodigo());
            $stmt->bindValue(4, $c->getQuantidade());
            $stmt->bindValue(5, $c->getDescricao());
            $stmt->bindValue(6, $c->getCategoria_id());

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
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Produto');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findId($id)
    {
        $stmt = Conexao::getConn()->prepare("select * from $this->tabela where id=?");
        $stmt->bindValue(1, $id);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Produto');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update(Produto $c)
    {
        try {
            $sql = "update $this->tabela set nome=?, valor=?, codigo=?, quantidade=?, descricao=?, categoria_id=? where id=?";

            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $c->getNome());
            $stmt->bindValue(2, $c->getValor());
            $stmt->bindValue(3, $c->getCodigo());
            $stmt->bindValue(4, $c->getQuantidade());
            $stmt->bindValue(5, $c->getDescricao());
            $stmt->bindValue(6, $c->getCategoria_id());
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

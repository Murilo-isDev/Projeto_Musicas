<?php

require_once "Conexao.php";
require_once "Musica.php";

class MusicaModel
{

    public $tabela = "musicas";

    public function create(Musica $c)
    {
        try {
            $sql = "insert into $this->tabela (nome, genero, ano, duracao, cantor, descricao, views) 
                values (?, ?, ?, ?, ?, ?, ?)";

            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $c->getNome());
            $stmt->bindValue(2, $c->getGenero());
            $stmt->bindValue(3, $c->getAno());
            $stmt->bindValue(4, $c->getDuracao());
            $stmt->bindValue(5, $c->getCantor());
            $stmt->bindValue(6, $c->getDescricao());
            $stmt->bindValue(7, $c->getViews());

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
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Musica');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findId($id)
    {
        $stmt = Conexao::getConn()->prepare("select * from $this->tabela where id=?");
        $stmt->bindValue(1, $id);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Musica');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update(Musica $c)
    {
        try {
            $sql = "update $this->tabela set nome=?, genero=?, ano=?, duracao=?, cantor=?, descricao=?, views=? where id=?";

            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $c->getNome());
            $stmt->bindValue(2, $c->getGenero());
            $stmt->bindValue(3, $c->getAno());
            $stmt->bindValue(4, $c->getDuracao());
            $stmt->bindValue(5, $c->getCantor());
            $stmt->bindValue(6, $c->getDescricao());
            $stmt->bindValue(7, $c->getViews());
            $stmt->bindValue(8, $c->getId());

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

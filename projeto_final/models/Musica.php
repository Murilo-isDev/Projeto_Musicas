<?php

class Musica
{
    private $id;
    private $nome;
    private $genero;
    private $ano;
    private $duracao;
    private $cantor;
    private $descricao;
    private $views;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

   
    public function getGenero()
    {
        return $this->genero;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }


    public function getAno()
    {
        return $this->ano;
    }
    public function setAno($ano)
    {
        $this->ano = $ano;
        return $this;
    }

   
    public function getDuracao()
    {
        return $this->duracao;
    }
    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;
        return $this;
    }

    public function getCantor()
    {
        return $this->cantor;
    }
    public function setCantor($cantor)
    {
        $this->cantor = $cantor;

        return $this;
    }


    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }


    public function getViews()
    {
        return $this->views;
    }
    public function setViews($views)
    {
        $this->views = $views;
        return $this;
    }

}

<?php

class Produto
{
    private $id;
    private $nome;
    private $valor;
    private $codigo;
    private $quantidade;
    private $descricao;
    private $categoria_id;
    


    public function getId()
    {
        return $this->id;
    }

  
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    //
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
    //

    public function getValor()
    {
        return $this->valor;
    }

  
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }
    //
   
    public function getCodigo()
    {
        return $this->codigo;
    }

   
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

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

    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }

    
}

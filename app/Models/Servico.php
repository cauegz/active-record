<?php
namespace App\Models;

use App\Core\Model;

class Servico extends Model{
    protected static string $table = "servico";
    protected ?int $id = null;
    protected string $nome;
    protected float $preco;
    protected int $duracao_min;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of duracao_min
     */ 
    public function getDuracao_min()
    {
        return $this->duracao_min;
    }

    /**
     * Set the value of duracao_min
     *
     * @return  self
     */ 
    public function setDuracao_min($duracao_min)
    {
        $this->duracao_min = $duracao_min;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of preco
     */ 
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @return  self
     */ 
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }
}
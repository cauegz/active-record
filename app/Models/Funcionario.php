<?php
namespace App\Models;

use App\Core\Model;

class Funcionario extends Model{
    protected static string $table = "funcionario";
    protected ?int $id = null;
    protected int $id_especialidade;
    protected string $nome;
    protected string $cpf;
    protected float $salario;

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
     * Get the value of id_especialidade
     */ 
    public function getId_especialidade()
    {
        return $this->id_especialidade;
    }

    /**
     * Set the value of id_especialidade
     *
     * @return  self
     */ 
    public function setId_especialidade($id_especialidade)
    {
        $this->id_especialidade = $id_especialidade;

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
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */ 
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of salario
     */ 
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set the value of salario
     *
     * @return  self
     */ 
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }
}
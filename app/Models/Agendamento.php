<?php
namespace App\Models;

use App\Core\Model;

class Agendamento extends Model{
    protected static string $table = "agendamento";
    protected ?int $id = null;
    protected int $id_funcionario;
    protected int $id_usuario;
    protected bool $infantil;
    protected string $horario;

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
     * Get the value of horario
     */ 
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Set the value of horario
     *
     * @return  self
     */ 
    public function setHorario($horario)
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * Get the value of infantil
     */ 
    public function getInfantil()
    {
        return $this->infantil;
    }

    /**
     * Set the value of infantil
     *
     * @return  self
     */ 
    public function setInfantil($infantil)
    {
        if(!is_bool($infantil)) $infantil = $infantil == "true" || $infantil == "1";
        $this->infantil = $infantil;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */ 
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of id_funcionario
     */ 
    public function getIdFuncionario()
    {
        return $this->id_funcionario;
    }

    /**
     * Set the value of id_funcionario
     *
     * @return  self
     */ 
    public function setIdFuncionario($id_funcionario)
    {
        $this->id_funcionario = $id_funcionario;

        return $this;
    }
}
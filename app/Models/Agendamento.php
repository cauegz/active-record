<?php
namespace App\Models;

use App\Core\Model;
use DateTime;

class Agendamento extends Model{
    protected static string $table = "agendamento";
    protected ?int $id = null;
    protected int $id_funcionario;
    protected int $id_usuario;
    protected bool $infantil;
    protected DateTime $horario;

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
        $this->infantil = $infantil;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of id_funcionario
     */ 
    public function getId_funcionario()
    {
        return $this->id_funcionario;
    }

    /**
     * Set the value of id_funcionario
     *
     * @return  self
     */ 
    public function setId_funcionario($id_funcionario)
    {
        $this->id_funcionario = $id_funcionario;

        return $this;
    }
}
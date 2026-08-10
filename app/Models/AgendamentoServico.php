<?php
namespace App\Models;

use App\Core\Model;

class AgendamentoServico extends Model{
    protected static string $table = "agendamento_servico";
    protected ?int $id = null;
    protected int $id_servico;
    protected int $id_agendamento;

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
     * Get the value of id_agendamento
     */ 
    public function getId_agendamento()
    {
        return $this->id_agendamento;
    }

    /**
     * Set the value of id_agendamento
     *
     * @return  self
     */ 
    public function setId_agendamento($id_agendamento)
    {
        $this->id_agendamento = $id_agendamento;

        return $this;
    }

    /**
     * Get the value of id_servico
     */ 
    public function getId_servico()
    {
        return $this->id_servico;
    }

    /**
     * Set the value of id_servico
     *
     * @return  self
     */ 
    public function setId_servico($id_servico)
    {
        $this->id_servico = $id_servico;

        return $this;
    }

    public static function getByAgendamento($id){
        return static::where("id_agendamento", $id);
    }
}
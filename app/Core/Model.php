<?php
namespace App\Core;

use PDO;

abstract class Model {
    protected ?int $id = null;
    protected static PDO $pdo;
    protected static string $table;

    public function save(){
        $atributos = get_object_vars($this);

        if(isset($this->id)){
            //UPDATE
            $campos = [];

            foreach($atributos as $coluna => $valor){
                if($coluna != "id"){
                    $campos[] = "$coluna = :$coluna";
                }
            }
            $sql = "UPDATE " . static::$table . " SET " . implode(",", $campos) . " WHERE id = :id";
        } else {
            //INSERT
            unset($atributos['id']);
            $colunas = array_keys($atributos);
            $sql = "INSERT INTO " . static::$table . "(" . implode(",", $colunas) . ") VALUES (:" . implode(", :", $colunas) . ")";
        }
        $stmt = static::getPDO()->prepare($sql);
        foreach($atributos as $campo => $valor){
            $stmt->bindValue(":$campo", $valor);
        }
        
        return $stmt->execute();
    }

    public function delete(){
        $sql = "DELETE FROM " . static::$table . " WHERE id = :id";
        $stmt = static::getPDO()->prepare($sql);
        $stmt->execute([":id" => $this->id]);
    }

    public static function find($id){
        $sql = "SELECT * FROM " . static::$table . " WHERE id = :id";
        $stmt = static::getPDO()->prepare($sql);
        $stmt->execute([":id" => $id]);
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);

        return $stmt->fetch();
    }

    public static function all(){
        $sql = "SELECT * FROM " . static::$table;
        $stmt = static::getPDO()->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);

        return $stmt->fetchAll();
    }

    protected static function getPDO(){
        if(!isset(static::$pdo)) static::$pdo = Conexao::getConnection();
        return static::$pdo;
    }
}
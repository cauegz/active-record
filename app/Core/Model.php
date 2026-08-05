<?php
namespace App\Core;

use PDO;

abstract class Model {
    protected ?int $id = null;
    protected PDO $pdo;
    protected string $table;

    public function __construct()
    {
        $pdo = Conexao::getConnection();
    }

    public function save(){
        $atributos = get_object_vars($this);

        if(isset($this->id)){
            //UPDATE
            $campos = [];

            foreach($atributos as $coluna){
                if($coluna != "id"){
                    $campos[] = "$coluna = :coluna";
                }
            }
            $sql = "UPDATE " . self::$table . " SET " . implode(",", $campos) . "WHERE id = :id";
        } else {
            //INSERT
            $colunas = array_keys($atributos);
            $sql = "INSERT INTO " . self::$table . "(" . implode(",", $colunas) . ") VALUES (:" . implode(", :", $colunas) . ")";
        }
        $stmt = self::$pdo->prepare($sql);
        foreach($atributos as $campo => $valor){
            $stmt->bindValue(":$campo", $valor);
        }
        return $stmt->execute();
    }

    public function delete(){
        $sql = "DELETE FROM " . self::$table . " WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([":id" => $this->id]);
    }

    public static function find($id){
        $sql = "SELECT * FROM " . self::$table . " WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([":id" => $id]);
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);

        return $stmt->fetch();
    }
}
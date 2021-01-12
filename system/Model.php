<?php
namespace BigBear\System;

use BigBear\Config\DBConfig;
use \PDO;

class Model
{
    private static $_connection = null;
    protected $tableName = '';
    protected $columns = [];
    protected $where = [];
    protected $sql = '';

    public function getSQL(){
        return $this->sql;
    }

    public function delete($conditions){
        if($conditions === '*'){
            $this->sql = sprintf("DELETE FROM %s",$this->tableName);
            return $this->getSQL();
        }
        $conditionTable = [];
        foreach($conditions as $column => $value){
            if(!is_numeric($value)){
                $value = "'$value'";
            }
            $conditionTable[] = $column . ' = ' . $value;
        }
        $this->sql = sprintf("DELETE FROM %s WHERE %s", $this->tableName, implode(' AND ', $conditionTable));
        return $this->getSQL();
    }

    public function select($columns){
        $this->columns = [];
        if(!is_array($columns)){
            $this->columns[] = $columns;
        }
        else{
            $this->columns = $columns;
        }

        return $this;
    }

    public function where(){
        $validValues = [
            'boolean' => ['and', 'or', 'not'],
            'operator' => ['<', '>', '<=', '>=', '==']
        ];
        $num_args = func_num_args();
        $boolean = 'and';
        $operator = '=';
        switch ($num_args){
            case 2: 
                list($column,$value) = func_get_args();
                break;
            case 3:
                list($column,$operator,$value) = func_get_args();
                break;
            case 4:
                list($column,$operator,$value,$boolean) = func_get_args();
                break;
            default:
                throw new \Exception();              
        }
        printf("<br/>Column: %s, Value: %s, Operator: %s, Boolean: %s",$column,$value, $operator, $boolean);

    }

    /*orWhere
    andWhere*/

    public function getConnection()
    {
        if (!self::$_connection) {
            self::$_connection = new PDO('mysql:host=' . DBConfig::DB_HOST . ';dbname=' . DBConfig::DB_NAME, DBConfig::DB_USER, DBConfig::DB_PASSWORD, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            return self::$_connection;
        }
        return self::$_connection;
    }
}
<?php

namespace classes\model;
use classes\model\account;
use classes\model\todo;
use classes\database\dbconn;
use \PDO;
use classes\view\view;



class model {
    protected $tableName;
    public function save()
    {
        if ($this->id == '') {
            $sql = $this->insert();
        } else {
            $sql = $this->update();
        }
    }
    private function insert() {
        $modelName1=static::$modelName;
        $modelName1=__NAMESPACE__."\\".$modelName1;
        $tableName = $modelName1::tableName();
        $this->id=21;
        $array = get_object_vars($this);
        array_pop($array);
        $columnString = array_keys($array);
        $columnString1=implode(',', $columnString);
        $valueString = "'".implode("','", $array)."'";
        $sql= 'INSERT INTO '.$tableName.' ('.$columnString1.')'.' VALUES '.'('.$valueString.')';
        $db = dbconn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
        echo 'Saved record id = ' . $this->id.'<br>';
    }
    private function update() {
        $modelName1=static::$modelName;
        $modelName1=__NAMESPACE__."\\".$modelName1;
        $tableName = $modelName1::tableName();
        $array = get_object_vars($this);
        array_pop($array);
        $temp=' ';
        $array1='';
        foreach($array as $key=>$value){
          $array1.=$temp.$key.'="'.$value.'"';
          $temp=", ";
        }
        $sql= 'update '.$tableName.' SET'.$array1.' where id='.$this->id;
        $db = dbconn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
        echo 'Updated record id = ' . $this->id.'<br>';
    }
    public function delete() {
        $modelName1=static::$modelName;
        $modelName1=__NAMESPACE__."\\".$modelName1;
        $tableName = $modelName1::tableName();
        $sql= 'delete from '.$tableName.' where id='.$this->id;
        $db = dbconn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
        echo 'Deleted record id = ' . $this->id.'<br>';
    }
    
}

?>
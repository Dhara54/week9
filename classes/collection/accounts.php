<?php
namespace classes\collection;
use classes\collection\collection;

final class accounts extends collection {
  protected static $modelName = 'account';
   
  public static function tableName1(){
    $tableName='accounts';
    return $tableName;
  }
}
?>
<?php


use classes\database\dbconn;
use classes\view\view;
use classes\collection\accounts;
use classes\collection\collection;
use classes\collection\todos;
use classes\model\account;
use classes\model\model;
use classes\model\todo;



class Manage{
  public static function autoload($class){
    include $class.'.php';
  }
}

spl_autoload_register(array('Manage','autoload'));

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$obl=new main();

class main{

  public function __construct(){
     echo 'Accounts Records.<br>';
     accounts::findAll();
     echo '<br>';
     
     echo 'Creating new id in accounts table.<br>';
     $record = new account();
     $record->id='';
     $record->email='dhara@gmail.com';
     $record->fname='Dhara';
     $record->lname='patel';
     $record->phone='253-585-5652';
     $record->birthday='2017-05-04';
     $record->gender='female';
     $record->password='asdf';
    $record->save();
     echo 'After adding record.<br>';
     accounts::findAll();
     echo '<br>';
     
     echo 'Searching id in accounts table.<br>';
     $id='20';
     accounts::findOne($id);
     
     echo '<br>';
     echo 'Updating id<br>';
     $record = new account();
     $record->id='20';
     $record->email='dp@gmail.com';
     $record->fname='dha';
     $record->lname='p';
     $record->phone='956-456-1456';
     $record->birthday='2017-02-03';
     $record->gender='female';
     $record->password='4562';
     $record->save();
     echo 'After update.<br>';
     accounts::findOne($id);
     echo '<br>';
     //print_r($record1);
  
    echo 'Deleting from accounts.<br>';
    $record=new account();
    $record->id='20';
    $record->delete();
    echo 'After Deleting id<br>';
    accounts::findAll();
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    
    echo 'Existing Todos Records.<br>';
     todos::findAll();
     echo '<br>';
     
     echo 'Creating new id in todos table.<br>';
     $record = new todo();
     $record->id='';
     $record->owneremail='dbp@gmail.com';
     $record->ownerid='7';
     $record->createddate='2017-05-06 00:00:00';
     $record->duedate='2017-11-10 00:00:00';
     $record->message='Active Record';
     $record->isdone='0';
     $record->save();
     echo 'After adding record.<br>';
     todos::findAll();
     echo '<br>';
     
     echo 'Searching new created id in todos table.<br>';
     $id=20;
     todos::findOne($id);
     
     echo '<br>';
     echo 'updating details of id.<br>';
     $record = new todo();
     $record->id=20;
     $record->owneremail='xyz@gmail.com';
     $record->ownerid='2';
     $record->createddate='2017-07-08 00:00:00';
     $record->duedate='2017-08-09 00:00:00';
     $record->message='Active Record update';
     $record->isdone='1';
     $record->save();
     echo 'After update.<br>';
     todos::findOne($id);
     echo '<br>';
    
    echo 'To delete id from todos.<br>';
    $record=new todo();
    $record->id='20';
    

    $record->delete();
    echo 'After Delete<br>';
    todos::findAll();
    echo '<br>';
    
    
    }
   
}

?>
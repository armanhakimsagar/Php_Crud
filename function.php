<?php
 

// static function for access by scope resulation. self keyword for access class

class Database
{
    private static $dbName = 'test' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
     
    private static $cont  = null;
     
    public static function connect()
    {
       self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
       
       return self::$cont;
    }

}




// insert class . after onsubmit run it


class project_Insert{
 
    public static function insert($sql) {

        $pdo = Database::connect();

        $insert = $pdo->query($sql);

        if($insert){
            echo "inserted";
        }

    }
 
}





// view class . after onsubmit run it


class project_View{
 
    public static function view($sql) {
        $pdo = Database::connect();
        $json_array = array();
        foreach ($pdo->query($sql) as $row) {
            $json_array[] = $row;
        }
        return $json_array;
    }
 
}




?>


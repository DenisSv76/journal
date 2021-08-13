<?php
namespace App\Classes;

use Illuminate\Support\Facades\DB;

class DataDb {
    /*private $DB_USERNAME='journal'; //имя пользователя в БД
    private $DB_SERVER_PASSWORD='sdfdgfd56!FT339'; //пароль пользователя БД
    protected static $_instance;  //экземпляр объекта
    
    
    public static function getInstance() { // получить экземпляр данного класса
        if (self::$_instance === null) { // если экземпляр данного класса  не создан
            self::$_instance = new self;  // создаем экземпляр данного класса
        }
        return self::$_instance; // возвращаем экземпляр данного класса
    }

    private  function __construct() { // конструктор отрабатывает один раз при вызове DB::getInstance();
            try {
                $this->connect = new \PDO('mysql:host=localhost;port=8080;dbname=journal;charset=UTF8', 'journal', 'sdfdgfd56!FT339');
              } catch (PDOException $e) {
                print "Error!: " . $e->getMessage();
                die();
              }

    }

    private function __clone() { //запрещаем клонирование объекта модификатором private
    }

    private function __wakeup() {//запрещаем клонирование объекта модификатором private
    }
    
     
    */
    public static function insertEntry($day,$id,$newtext) {
        $STH = DB::table('list_entry')->insert(['day' => $day, 'id_entry' => $id, 'entry' => $newtext]); 
        //$STH->execute($data);
    }

    public static function readEntry($day) {
        //global $conn;
        $STH = DB::table('list_entry')->where('day', '=', $day)->get();
        /*$STH->execute(array($day));
        $arrEntrys=$STH->fetchAll(PDO::FETCH_ASSOC);*/
        return $STH;
    }

    public static function markEntry($id,$mark) {
        //global $conn;
        //$data = array('id' => $id, 'mark' => $mark ); 
        $STH = DB::table('list_entry')->where('id', $id)->update(['mark' => $mark]);
        //$STH->execute($data);
    }
    
    public static function readPlans() {
        //global $conn;
        $STH = DB::table('plans')->get();
        /*$STH->execute(array($day));
        $arrEntrys=$STH->fetchAll(PDO::FETCH_ASSOC);*/
        return $STH;
    }
    
    public static function deletePlans() {
        //global $conn;
        //$data = array('day' => $day, 'id_entry' => $id, 'entry' => $newtext ); 
        $STH = DB::table('plans')->delete();
        //$STH->execute($data);
    }
    
    public static function insertPlans($newtext) {
        //global $conn;
        //$data = array('day' => $day, 'id_entry' => $id, 'entry' => $newtext ); 
        
        $STH = DB::table('plans')->insert(['text' => $newtext]);  
        //$STH->execute($data);
    }

}

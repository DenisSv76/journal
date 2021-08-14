<?php
namespace App\Classes;

use Illuminate\Support\Facades\DB;

class DataDb {
    
    public static function delEntry($id) {
        $STH = DB::table('list_entry')->where('id', '=', $id)->delete(); 
        //$STH->execute($data);
    }
    
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

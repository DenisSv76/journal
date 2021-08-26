<?php
namespace App\Classes;

use Illuminate\Support\Facades\DB;
use App\Entry;
use App\Plan;

class DataDb {
    
    public static function delEntry($id) {
        //$STH=Entry::where('id', '=', $id)->delete();
        $STH = DB::table('list_entry')->where('id', '=', $id)->delete(); 
        //$STH->execute($data);
    }
    
    public static function insertEntry($day,$id,$newtext) {
        $date=date('Y-m-d h:i:s');
        //$STH=Entry::insert(['day' => $day, 'id_entry' => $id, 'entry' => $newtext,'created_at'=>$date,'updated_at'=>$date]); 
        $STH = DB::table('list_entry')->insert(['day' => $day, 'id_entry' => $id, 'entry' => $newtext]); 
        //$STH->execute($data);
    }

    public static function readEntry($day) {
        //global $conn;
        //$STH=Entry::where('day', '=', $day)->get();
        $STH = DB::table('list_entry')->where('day', '=', $day)->get();
        
        return $STH;
    }

    public static function markEntry($id,$mark) {
        //global $conn;
        //$data = array('id' => $id, 'mark' => $mark ); 
        //$STH=Entry::where('id', $id)->update(['mark' => $mark]);
        $STH = DB::table('list_entry')->where('id', $id)->update(['mark' => $mark]);
        //$STH->execute($data);
    }
    
    public static function commEntry($id,$comm) {
        //global $conn;
        //$data = array('id' => $id, 'mark' => $mark ); 
        //$STH=Entry::where('id', $id)->update(['comment' => $comm]);
        $STH = DB::table('list_entry')->where('id', $id)->update(['comment' => $comm]);
        //$STH->execute($data);
    }
    
    public static function readPlans() {
        //global $conn;
        //$STH=Plan::get();
        $STH = DB::table('plans')->get();
        /*$STH->execute(array($day));
        $arrEntrys=$STH->fetchAll(PDO::FETCH_ASSOC);*/
        return $STH;
    }
    
    public static function deletePlans() {
        //global $conn;
        //$data = array('day' => $day, 'id_entry' => $id, 'entry' => $newtext ); 
        //$STH=Plan::delete();
        $STH = DB::table('plans')->delete();
        //$STH->execute($data);
    }
    
    public static function insertPlans($newtext) {
        //global $conn;
        //$data = array('day' => $day, 'id_entry' => $id, 'entry' => $newtext ); 
        $date=date('Y-m-d h:i:s');
        //$STH=Plan::insert(['text' => $newtext,'created_at'=>$date,'updated_at'=>$date]);  
        $STH = DB::table('plans')->insert(['text' => $newtext,'created_at'=>$date,'updated_at'=>$date]);  
        //$STH->execute($data);
    }
    
    

}

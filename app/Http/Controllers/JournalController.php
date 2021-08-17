<?php

namespace App\Http\Controllers;

use App\Classes\Entry;
use App\Classes\DataDb;
use App\Classes\Plans;
use Illuminate\Http\Request; // подключим класс Request

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

		
		public function __construct()
		{
			
		}
                
                public function showJournal(Request $request)
                {
                    //
                   
                    //require_once "/app/Classes/Db.php";
                    //require_once "/app/Classes/Entry.php";
                    // подключаем Модель (ядро)
                    // Обработка формы, если Шаблон запущен при отправке формы.
                    // Если нажата кнопка Добавить...
                    // 
                    
                
                     $oldEntrys=self::oldEntrys($request);
                     $newEntrys=self::newEntrys($request);
                     $strPlans=self::Plans($request);
                    
                    
                    //return '!!!';
                    return view('journal.showJournal',['date_search'=>$oldEntrys['date_search'], 'objEntrys'=> $oldEntrys['objEntrys'], 'arrEntrys'=>$newEntrys['arrEntrys'],'arrText'=>$newEntrys['arrText'],'strPlans'=>$strPlans]);

                }
                
                private function oldEntrys($request){
                    // Блок вчерашних записей. 

                    if ($request->filled('save_mark')) {
                        $i=1;
                        
                        foreach ($request->all() as $key=>$val) {
                            if (strpos($key,"comm_old_")!==false && $val != '') {
                               //$this->validate($request,[$key=> 'required']);
                               $id=explode("comm_old_", $key)[1];
                               DataDb::commEntry($id,$val);
                            }
                        }
                        
                        foreach ($request->all() as $key=>$mark) {
                            if (strpos($key,"select_")!==false) {
                                $this->validate($request,[$key=> 'required|integer|between:0,5']);
                                $id=explode("_", $key)[1];
                                DataDb::markEntry($id,$mark);
                            }
                        }
                    }
                    $date_search=date("Y-m-d",time() - 86400);
                    if ($request->filled('date_search')) {
                         dump($request->input('date_search'));
                        //$this->validate($request,['date_search'=> 'date_format:YYYY-MM-DD']);
                        $date_search=$request->input('date_search');
                    }
                   
                    $arrEntrys=DataDb::readEntry($date_search);
                    $arrSelect=[];
                    $objEntrys=[];
                    foreach ($arrEntrys as $row) {
                        $Entry=new Entry($row->id,$row->day,$row->id_entry,$row->entry,$row->mark,$row->comment);
                        $objEntrys[]=$Entry;
                        if (empty($Entry->getMark())) {
                            $arrSelect[]=[0,1,2,3,4,5];
                        } else {
                            $arrSelect[]=$Entry->getMark();
                        }
                    }
                    $result=['date_search'=>$date_search,'objEntrys'=>$objEntrys];
                    return $result;
                }
                
                private function newEntrys($request) {
                    //Блок новых записей. 
                    if ($request->filled('save_text')) {
                        foreach ($request->all() as $key=>$newtext) {
                            if (strpos($key,"text_")!==false) {
                                $this->validate($request,[$key=> 'required|min:5']);
                                $i=explode("_", $key)[1];
                                $Entry=new Entry(0,date("Y-m-d"),$i,$newtext);
                                DataDb::insertEntry($Entry->getDate(),$Entry->getIdEntry(),$Entry->getText());
                            }
                        }
                        $rnd = time(); # ВНИМАНИЕ!
                        //return redirect('/', ['time'=>$rnd]);
                        //return redirect()->away("/?$rnd");
                    }
                    $arrEntrys=DataDb::readEntry(date("Y-m-d"));
                    $arrText=[];
                    foreach ($arrEntrys as $row) {
                        $Entry=new Entry($row->id,$row->day,$row->id_entry,$row->entry,$row->mark);
                        $arrText[]=$Entry->getText();
                    }
                    $result=['arrEntrys'=>$arrEntrys,'arrText'=>$arrText];
                    return $result;
                }
                
                private function Plans($request) {
                    //Планы
                    if ($request->filled('save_plans')) {
                        $this->validate($request,['plans_'=> 'required|min:5']);
                        DataDb::deletePlans();
                        foreach ($request->all() as $key=>$newtext) {
                            if (strpos($key,"plans_")!==false) {
                                $texts_plans = explode(PHP_EOL,trim($newtext));
                                foreach ($texts_plans as $texts_plan) {
                                    $Plan=new Plans(0,trim($texts_plan));
                                    DataDb::insertPlans($Plan->text);
                                }
                            }
                        }
                    }
                    $arrPlans=DataDb::readPlans();
                    $arrTextPlans=[];
                    foreach ($arrPlans as $row) {
                        $Plan=new Plans($row->id,$row->text);
                        $arrTextPlans[]=trim($Plan->text);
                    }
                   
                    $strPlans=trim(implode(PHP_EOL, $arrTextPlans));
                    
                    return $strPlans;
                }
                
                public function delEntry($id) {
                    if (!empty($id)) {
                        DataDb::delEntry($id);
                        return redirect('/');
                    }
                }

}

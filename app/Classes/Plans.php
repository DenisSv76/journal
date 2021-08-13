<?php
namespace App\Classes;

class Plans {
    private $id;
    private $text;

    function __construct($id=0,$newtext='') {
            $this->id=$id;
            $this->text=$newtext;

    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
        $this->$property=$value;
    }




}
?>

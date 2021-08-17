<?php
namespace App\Classes;

class Entry {
private $id;
private $date;
private $id_entry;
private $mark;
private $text;
private $comment;

function __construct($id=0,$day=0,$id_entry=0,$newtext='',$mark=null,$comm='') {
	$this->id=$id;
	$this->date=$day;
	$this->id_entry=$id_entry;
	$this->mark=$mark;
	$this->text=$newtext;
        $this->comment=$comm;
}

public function createNewEntry() {}


public function getId() {
	return $this->id;
}
public function setId() {}

public function getDate() {
	return $this->date;
}
public function setDate() {}

public function getMark() {
	return $this->mark;
}
public function setMark() {}

public function getText() {
	return $this->text;
}
public function setText() {}

public function getIdEntry() {
	return $this->id_entry;
}
public function setIdEntry() {}

public function getComm() {
	return $this->comment;
}
public function setComm() {}




}
?>

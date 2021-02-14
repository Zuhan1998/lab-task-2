<?php
class Circle{
	//prop
	private $radius;

	//cons
	public function __construct($radius=1){
		$this->radius=$radius;
	}
	//destructor 
	public function __destruct(){ 
		echo "destructor";
	}
	//Methods
	public function setradius($radius){
		$this->radius=$radius;
	}
	public function getradius(){
		return $this->radius;
	}
	public function getArea($number){
		return 3.14*$this->radius*$this->radius;
	}
}
?>

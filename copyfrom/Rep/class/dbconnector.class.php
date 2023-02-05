<?php


/**
* 
*/
class Connectors{
	public $database_name="FORMS\TUNDE";
	public $database="IOU";
	public $UID="sa";
	public $PWD="Lambvard01###";
	
	public function choosenconnector()
	{
		$this->database_name;
		$this->database;
		$this->UID;
		$this->PWD;
		$db_connection=sqlsrv_connect($this->database_name,array("Database"=>$this->database,"UID"=>$this->UID,"PWD"=>$this->PWD));

		return $db_connection;
	}
}






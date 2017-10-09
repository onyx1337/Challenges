<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	class Chat {

		public $username;
		private $log_length = 20;


		function __construct(){
			if (empty($_COOKIE['username'])) {
				$this->username = "user_".uniqid();
				setcookie("username", $this->username ,time()+3600 * 24 * 365, '/');
			}else{
				$this->username = $_COOKIE['username'];
			}

			$this->customConstruct();
		}

		public function getLog(){
			$logArray = $this->customGetLog();
			return $logArray;

		}

		public function writeLog($message){
			$logData = array(
				date("Y-m-d H:i:s"),
				$this->username,
				htmlentities($message)
			);
			$logData = array_merge(array($logData),$this->getLog());
			$logData = array_shift(array_chunk($logData, $this->log_length));
			$this->customWriteLog($logData);

		}

		public function customConstruct(){}

		public function customGetLog(){}

		public function customWriteLog(){}

	}
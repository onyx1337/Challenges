<?php
	require_once '../libs/chat_main_class.php';

	class ChatSession extends Chat
	{


		private $sessId;

		public function customConstruct()
		{

			$this->sessId = ftok(__FILE__, 'A');
			session_id($this->sessId);
			session_start();
		}

		public function customGetLog()
		{
			$logArray = !empty($_SESSION['msg_log']) ? $_SESSION['msg_log'] : array();

			return $logArray;
		}

		public function customWriteLog($logData)
		{

			$_SESSION['msg_log'] = $logData;

		}

	}
<?php
	require_once '../libs/chat_main_class.php';

	class ChatCsv extends Chat
	{

		private $file_name = 'chat.csv';
		private $file_path;

		public function customConstruct()
		{

			$this->file_path = dirname(__FILE__) . "/" . $this->file_name;

		}

		public function customGetLog()
		{

			$logArray = array();
			$handle = fopen($this->file_path, "r");
			if ($handle !== FALSE) {
				while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
					$logArray[] = $data;
				}
				fclose($handle);
			}

			return $logArray;
		}

		public function customWriteLog($logData)
		{

			$fp = fopen($this->file_path, 'w');
			foreach ($logData as $line) {
				fputcsv($fp, $line);
			}
			fclose($fp);
		}
	}
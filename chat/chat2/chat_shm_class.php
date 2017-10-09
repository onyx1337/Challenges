<?php
	require_once '../libs/chat_main_class.php';

	class ChatShm extends Chat
	{

		private $id;
		private $shmId;

		public function customConstruct()
		{

			$this->id = ftok(__FILE__, 'A');
			$this->shmId = shm_attach($this->id);
		}

		public function customGetLog()
		{
			$logArray = array();
			if (shm_has_var($this->shmId, $this->id)) {
				$logArray = (array)shm_get_var($this->shmId, $this->id);
			}

			return $logArray;
		}

		public function customWriteLog($logData)
		{
			shm_put_var($this->shmId, $this->id, $logData);
		}

	}
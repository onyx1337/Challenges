<?php
	if(!empty($_POST['type'])){
		switch ($_POST['req']) {
			case "csv":
				require_once '../chat1/chat_csv_class.php';
				$chatObj = new ChatCsv();
				break;
			case "shm":
				require_once '../chat2/chat_shm_class.php';
				$chatObj = new ChatShm();
				break;
			case "session":
				require_once '../chat3/chat_sess_class.php';
				$chatObj = new ChatSession();
				break;
			default:
				die();
		}

		switch ($_POST['type']) {
			case "submit":
				if (!empty($_POST['message'])) $chatObj->writeLog($_POST['message']);
				break;
			case "getLog":
				echo json_encode($chatObj->getLog());
				break;

		}

	}
?>
<?php
	require_once 'chat_csv_class.php';
	$chatObj = new ChatCsv();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/custom.css" />
	<script src="../js/jquery-1.11.1.js"></script>
	<script src="../js/jquery.cookie.js"></script>
	<script type="application/javascript">
		var req = 'csv';
	</script>
	<script src="../js/custom.js"></script>
</head>
<body>

<div class="container">

	<div class="header">
		<h3 class="text-muted">File Based Chat</h3>
	</div>

	<div id="chat">

	</div>


	<form class="form-horizontal" role="form" method="post" id="form">
		<legend>Hello: <b><?=$chatObj->username?></b></legend>

		<div class="form-group">
			<label for="inputMessage" class="col-sm-2 control-label">Message</label>
			<div class="col-sm-10">
				<textarea class="form-control" id="inputMessage" placeholder="Message" name="message"></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
</form>
</div>
</body>
</html>
<?php

try
{
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=forum-prod', 'root', '');
	$dbh->exec("SET CHARACTER SET utf8");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	$sql = "DELETE FROM forums WHERE id = ?";
	$q = $dbh->prepare($sql);

	$response = $q->execute(array($_GET['id']));

	echo json_encode(['res' => 'success']);
}
catch (PDOException $e)
{
	print "Error!: " . $e->getMessage();
	die();
}
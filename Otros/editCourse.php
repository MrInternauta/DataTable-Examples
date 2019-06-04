<?php
try
{
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=elearning', 'root', '');
	$dbh->exec("SET CHARACTER SET utf8");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	$data = [];
	parse_str($_POST['course'], $data);

	$id = $data['course_id'];
	$name = $data['course_name'];
	$description = $data['course_description'];

	$query = $dbh->prepare('UPDATE courses SET name = ?, description = ? WHERE id = ?');
	$query->bindParam(1, $name);
	$query->bindParam(2, $description);
	$query->bindParam(3, $id);
	$query->execute();
	$dbh = null;

	echo json_encode(["res" => "success"]);
}
catch (PDOException $e)
{
	echo json_encode(["res" => $e->getMessage()]);
}
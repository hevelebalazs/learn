<?php
global $db;
if(!isset($db)) {
	$config = $CONFIG["db"];
	$db = mysqli_connect($config["host"],
				         $config["user"],
						 $config["password"],
						 $config["database"]);
	mysqli_set_charset($db, $config["charset"]);
	if($db == false) {
		die("Cannot connect to db!");
	}
}

function query($query) {
	global $db;
	$res = mysqli_query($db, $query);
	if($res == false) {
		echo "Cannot execute query:<br>";
		echo $query;
		die;
	}
	return $res;
}
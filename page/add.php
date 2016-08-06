<?php
include "db/dict.php";
if($_SERVER["REQUEST_METHOD"] == "GET") {
	if(!isset($_GET["dict"])) {
		//select dict
		$dicts = dictAll();
		include "view/add/select_dict.php";
	} else {
		//add word
		$dictId = $_GET["dict"];
		$dict = dictAtId($dictId);
		include "view/add/add.php";
	}
} else {
	//add word
	include "db/word.php";
	wordAdd($_POST);
	include "view/add/ok.php";
}
?>
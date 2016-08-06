<?php
include "db/word.php";
//start session
if(!isset($_SESSION["ids"])) {
	if(!isset($_POST["dict"])) {
		//select dictionary
		include "db/dict.php";
		$dicts = dictAll();
		include "view/session/select_dict.php";
		exit;
	} else {
		$dictId = $_POST["dict"];
		$ids = wordTopIds($dictId, 30);
		$_SESSION["ids"] = $ids;
		$_SESSION["index"] = 0;
	}
}
$ids = $_SESSION["ids"];
$index = $_SESSION["index"];
//validation
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guess"])) {
	$id = $ids[$index];
	$word = wordAtId($id);
	$lang2 = $word["lang2"];
	$guess = $_POST["guess"];
	if($guess == $lang2) {
		wordGood($id);
		echo "Correct";
		//step to next word
		$_SESSION["index"]++; $index++;
	} else {
		wordBad($id);
		echo "Wrong";
	}
}
//load view
if(isset($ids[$index])) {
	$id = $ids[$index];
	$word = wordAtId($id);
	$lang1 = $word["lang1"];
	include "view/session/session.php";
} else {
	unset($_SESSION["ids"]);
	unset($_SESSION["index"]);
	include "view/session/finish.php";
}
?>
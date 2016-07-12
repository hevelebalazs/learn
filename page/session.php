<?php
include "db/word.php";
//start session
if(!isset($_SESSION["ids"])) {
	$ids = wordTopIds(30);
	$_SESSION["ids"] = $ids;
	$_SESSION["index"] = 0;
}
$ids = $_SESSION["ids"];
$index = $_SESSION["index"];
//validation
if($_SERVER["REQUEST_METHOD"] == "POST") {
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
	include "view/session.php";
} else {
	unset($_SESSION["ids"]);
	unset($_SESSION["index"]);
	include "view/finish.php";
}
?>
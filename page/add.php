<?php
if($_SERVER["REQUEST_METHOD"] == "GET") {
	include "view/add.php";
} else {
	include "db/word.php";
	wordAdd($_POST);
	include "view/add_ok.php";
}
?>
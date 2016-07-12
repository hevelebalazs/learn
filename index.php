<?php
include "config.php";
include "db/init.php";
session_start();
$pages = array("home", "add", "session", "giveup");
$default = "home";

if(isset($_GET["page"])) {
	$page = $_GET["page"];
} else {
	$page = $default;
}

if(!in_array($page, $pages)) $page = $default;

require("page/$page.php");

?>
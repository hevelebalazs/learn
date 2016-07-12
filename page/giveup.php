<?php
include "db/word.php";
$ids = $_SESSION["ids"];
$index = $_SESSION["index"];
$id = $ids[$index];
//give up counts as a fail
wordBad($id);
$word = wordAtId($id);
$lang1 = $word["lang1"];
$lang2 = $word["lang2"];
include "view/giveup.php";
include "view/session.php";
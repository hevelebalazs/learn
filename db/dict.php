<?php
function dictAll() {
	$query = "SELECT * FROM dict";
	$res = query($query);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}
function dictAtId($id) {
	$query = "SELECT * FROM dict
				WHERE id = $id";
	$res = query($query);
	return mysqli_fetch_assoc($res);
}
?>
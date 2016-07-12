<?php
function wordAdd($data) {
	$lang1 = $data["lang1"];
	$lang2 = $data["lang2"];
	$query = "INSERT INTO word (lang1,lang2)
					 VALUES ('$lang1', '$lang2')";
    query($query);
}
function wordTopIds($limit) {
	$query = "SELECT `id` FROM word
						  ORDER BY rating ASC
						  LIMIT $limit";
	$res = query($query);
	while($row = mysqli_fetch_array($res)) {
		$id = (int)$row[0];
		$ids []= $id;
	}
	return $ids;
}
function wordAtId($id) {
	$query = "SELECT * FROM word
					   WHERE id = $id";
    $res = query($query);
	return mysqli_fetch_assoc($res);

}
function wordGood($id) {
	//good guess
	$query = "UPDATE word SET rating = rating/2 + 1
						  WHERE id = $id";
    query($query);
}
function wordBad($id) {
	//bad guess
	$query = "UPDATE word SET rating = rating/2 - 1
						  WHERE id = $id";
	query($query);
}
?>
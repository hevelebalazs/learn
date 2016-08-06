<?php
function wordAdd($data) {
	$dict  = $data["dict"];
	$lang1 = $data["lang1"];
	$lang2 = $data["lang2"];
	$query = "INSERT INTO word (lang1,lang2, dict)
					 VALUES ('$lang1', '$lang2', $dict)";
    query($query);
}
function wordTopIds($dictId, $limit) {
	$query = "SELECT `id` FROM word
						  WHERE word.dict = $dictId
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
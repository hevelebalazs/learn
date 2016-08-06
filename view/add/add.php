<?php
$dictId = $dict["id"];
$lang1  = $dict["lang1"];
$lang2  = $dict["lang2"];
?>
<form method="post">
	<input type="hidden" name="dict" value="<?php echo $dictId; ?>">
	<input type="text" name="lang1" placeholder="<?php echo $lang1; ?>">
	<input type="text" name="lang2" placeholder="<?php echo $lang2; ?>">
	<input type="submit">
</form>
<a href="?">
	<p>Home</p>
</a>
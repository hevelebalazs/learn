<form method="GET">
	<input type="hidden" name="page" value="add">
	<select name="dict">
	<?php foreach($dicts as $dict): ?>
		<?php 
		$value = $dict["lang1"] . " - " . $dict["lang2"];
		$id    = $dict["id"];
		?>
		<option value="<?php echo $id ?>">
			<?php echo $value; ?>
		</option>
	<?php endforeach; ?>
	</select>
	<input type="submit" value="Select">
</form>
<a href="?">
	<p>Home</p>
</a>
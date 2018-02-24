<h2><?php echo $title; ?></h2>
<?php echo form_open('search/profile') ?>
	<input type="text" name="cond">
	<input type="submit">
</form>
<?php
	print_r($profile);
?>
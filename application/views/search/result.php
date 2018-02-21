<h2><?php echo $title; ?></h2>
<?php echo form_open('search/search') ?>
	<input type="text" name="cond">
	<input type="submit">
</form>
<?php foreach ($facultymembers as $teacher_item): ?>
<br>
<h3><?php echo $teacher_item['name'];?></h3>
<table border="1">
	<tr>
		<td> 學院 </td>
		<td> <?php echo $teacher_item['c_cname'] ?> </td>
		<td> 系所 </td>
		<td> <?php echo $teacher_item['d_cname'] ?> </td>
	</tr>
	<tr>
		<td> 姓名 </td>
		<td> <?php echo $teacher_item['name'] ?> </td>
		<td> 職銜	</td>
		<td> <?php echo $teacher_item['PP'] ?> </td>
	</tr>
	<tr>
		<td> 聯絡電話	</td>
		<td> <?php echo $teacher_item['phone'] ?> </td>
		<td> 分機	</td>
		<td> <?php echo $teacher_item['extension'] ?> </td>
	</tr>
	<tr>
		<td> 傳真 </td>
		<td> <?php echo $teacher_item['fax'] ?> </td>
		<td> 信箱 </td>
		<td> <?php echo $teacher_item['email'] ?> </td>
	</tr>
	<tr>
		<td> 專長領域 </td>
		<td colspan="3"> <?php echo $teacher_item['specialized'] ?> </td>
	</tr>
	<?php
		if (isset($teacher_item['project'])) {
	?>
	<tr>
		<td colspan="4">
			<?php
			print_r($teacher_item['project']);
			?>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<?php
			print_r($teacher_item);
			?>
		</td>
	</tr>
	<?php
		}
	?>
</table>
<br>
<?php endforeach ?>
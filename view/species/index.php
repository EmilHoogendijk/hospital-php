<h2>Species</h2>
<div class="container">
	<table border="1">
		<tr>
			<th>Species</th>
			<th colspan="2">Action</th>
		</tr>

		<?php foreach ($species as $species) { ?>
		<tr>
			<td><?= $species['species_description']; ?></td>
			<td><a href="<?php echo URL . 'species/edit/' . $species['species_id']; ?>">Edit</a></td>
			<td><a href="<?php echo URL . 'species/delete/' . $species['species_id']; ?>">Delete</a></td>
		</tr>
		<?php } ?>

	</table>
	<a href="<?= URL ?>species/create">Add</a>
</div>
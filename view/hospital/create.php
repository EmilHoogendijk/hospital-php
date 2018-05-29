<div class="container">
	<form action="<?= URL ?>hospital/createSave" method="post">
	
		<select name="client">
			<option value="">-----------------</option>
			<?php foreach ($clients as $client) { ?>
				<option value="<?= $client['client_id']?>"> <?= $client['client_firstname'] . ' '. $client['client_lastname']?> </option>
			<?php } ?>
		</select>

		<select name="species">
			<option value="">-----------------</option>
			<?php foreach ($species as $species) { ?>
				<option value="<?= $species['species_id']?>"> <?= $species['species_description'] ?> </option>
			<?php } ?>
		</select>

		<input type="text" name="patient" placeholder="Pet name">
		<input type="text" name="complaint" placeholder="Pet complaint">
		<input type="submit" value="Add">
	
	</form>

</div>
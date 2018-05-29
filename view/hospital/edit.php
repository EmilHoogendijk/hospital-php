<div class="container">
	<form action="<?= URL ?>hospital/editSave" method="post">
	
		<select name="client">
			<?php foreach ($clients as $client) { ?>
				<option <?php if($client['client_id'] == $patients['client_id']) { ?> selected <?php } ?> value="<?= $client['client_id']?>"> <?= $client['client_firstname'] . ' '. $client['client_lastname']?> </option>
			<?php } ?>
		</select>


		<select name="species">
			<?php foreach ($species as $specie) {?>
				<option <?php if($specie['species_id'] == $patients['species_id']) { ?> selected <?php } ?> value="<?= $specie ['species_id']?>"> <?= $specie['species_description']?></option>
			<?php } ?>
		</select>

		<input type="text" name="patient" value="<?= $patients['patient_name']; ?>">
		<input type="text" name="complaint" value="<?= $patients['patient_status']; ?>">
		<input type="hidden" name="id" value="<?= $patients['patient_id']; ?>">
		<input type="submit" value="Submit">
	
	</form>

</div>
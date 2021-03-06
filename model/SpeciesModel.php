<?php

function getSpecies($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species WHERE species_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function getAllSpecies() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function createSpecies() 
{
	$species = isset($_POST['species']) ? $_POST['species'] : null;
	
	if (strlen($species) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO species(species_description) VALUES (:species)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':species' => $species));

	$db = null;
	
	return true;
}

function editSpecies() 
{
	$species = isset($_POST['species']) ? $_POST['species'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	
	if (strlen($species) == 0) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE species SET species_description = :species WHERE species_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':species' => $species,
		':id' => $id));

	$db = null;
	
	return true;
}

function deleteSpecies($id = null) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM species WHERE species_id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
	
	return true;
}
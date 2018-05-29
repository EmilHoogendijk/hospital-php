<?php

function getPatient($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM patients WHERE patient_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function getAllPatients() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM patients
			INNER JOIN clients ON patients.client_id = clients.client_id
			INNER JOIN species ON patients.species_id = species.species_id ";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getAllClients() {
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM clients";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getAllSpecies() {
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function editPatients() 
{
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$client = isset($_POST['client']) ? $_POST['client'] : null;
	$species = isset($_POST['species']) ? $_POST['species'] : null;
	$patient = isset($_POST['patient']) ? $_POST['patient'] : null;
	$complaint = isset($_POST['complaint']) ? $_POST['complaint'] : null;
	


	if (strlen($client) == 0 || strlen($species) == 0 || strlen($patient) == 0 || strlen($complaint) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "UPDATE patients SET client_id = :client, species_id = :species, patient_name = :patient, patient_status = :complaint WHERE patient_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id,
		':client' => $client,
		':species' => $species,
		':patient' => $patient,
		':complaint' => $complaint));

	$db = null;
	
	return true;
}

function deletePatient($id = null) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM patients WHERE patient_id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
	
	return true;
}

function createPatient() 
{
	$client = isset($_POST['client']) ? $_POST['client'] : null;
	$species = isset($_POST['species']) ? $_POST['species'] : null;
	$patient = isset($_POST['patient']) ? $_POST['patient'] : null;
	$complaint = isset($_POST['complaint']) ? $_POST['complaint'] : null;
	
	if (strlen($patient) == 0 || strlen($species) == 0 || strlen($client) == 0 || strlen($complaint) == 0){
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO patients(patient_name, species_id, client_id, patient_status) VALUES (:patient, :species, :client, :complaint)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':patient' => $patient,
		':species' => $species,
		':client' => $client,
		':complaint' => $complaint));

	$db = null;
	
	return true;
}

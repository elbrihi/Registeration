<?php
class RegistrationManager{

	//attributes
	private $_db;

	//constructor
    public function __construct($db){
        $this->_db = $db;
    }

	//BASIC CRUD OPERATIONS
	public function add(Registration $registration){
        $query = $this->_db->prepare(' INSERT INTO t_registration (
		first_name, last_name, email, adress, street_number, zip_code, city, created, createdBy)
		VALUES (:first_name, :last_name, :email, :adress, :street_number, :zip_code, :city, :created, :createdBy)')
		or die (print_r($this->_db->errorInfo()));
		$query->bindValue(':first_name', $registration->first_name());
		$query->bindValue(':last_name', $registration->last_name());
		$query->bindValue(':email', $registration->email());
		$query->bindValue(':adress', $registration->adress());
		$query->bindValue(':street_number', $registration->street_number());
		$query->bindValue(':zip_code', $registration->zip_code());
		$query->bindValue(':city', $registration->city());
		$query->bindValue(':created', $registration->created());
		$query->bindValue(':createdBy', $registration->createdBy());
		$query->execute();
		$query->closeCursor();
	}

	

	

}
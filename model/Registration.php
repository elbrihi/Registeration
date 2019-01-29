<?php
class Registration{

	//attributes
	private $_id;
	private $_first_name;
	private $_last_name;
	private $_email;
	private $_adress;
	private $_street_number;
	private $_zip_code;
	private $_city;
	private $_created;
	private $_createdBy;
	private $_updated;
	private $_updatedBy;

	//le constructeur
    public function __construct($data){
        $this->hydrate($data);
    }
    
    //la focntion hydrate sert à attribuer les valeurs en utilisant les setters d\'une façon dynamique!
    public function hydrate($data){
        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

	//setters
	public function setId($id){
        $this->_id = $id;
    }
	public function setFirst_name($first_name){
        $this->_first_name = $first_name;
    }

	public function setLast_name($last_name){
        $this->_last_name = $last_name;
    }

	public function setEmail($email){
        $this->_email = $email;
    }

	public function setAdress($adress){
        $this->_adress = $adress;
    }

	public function setStreet_number($street_number){
        $this->_street_number = $street_number;
    }

	public function setZip_code($zip_code){
        $this->_zip_code = $zip_code;
    }

	public function setCity($city){
        $this->_city = $city;
    }

	public function setCreated($created){
        $this->_created = $created;
    }

	public function setCreatedBy($createdBy){
        $this->_createdBy = $createdBy;
    }

	public function setUpdated($updated){
        $this->_updated = $updated;
    }

	public function setUpdatedBy($updatedBy){
        $this->_updatedBy = $updatedBy;
    }

	//getters
	public function id(){
        return $this->_id;
    }
	public function first_name(){
        return $this->_first_name;
    }

	public function last_name(){
        return $this->_last_name;
    }

	public function email(){
        return $this->_email;
    }

	public function adress(){
        return $this->_adress;
    }

	public function street_number(){
        return $this->_street_number;
    }

	public function zip_code(){
        return $this->_zip_code;
    }

	public function city(){
        return $this->_city;
    }

	public function created(){
        return $this->_created;
    }

	public function createdBy(){
        return $this->_createdBy;
    }

	public function updated(){
        return $this->_updated;
    }

	public function updatedBy(){
        return $this->_updatedBy;
    }

}
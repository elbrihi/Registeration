<?php
class RegistrationActionController {

    //attributes
    protected $_actionMessage;
    protected $_typeMessage;
    protected $_source;
    protected $_registrationManager;

    //constructor
    public function __construct($source){
    	$this->_registrationManager = new RegistrationManager(PDOFactory::getMysqlConnection());
    	$this->_source = $source;
    }

    //getters
    public function actionMessage(){
        return $this->_actionMessage;
    }
    

    public function typeMessage(){
        return $this->_typeMessage;
    }
    

    public function source(){
        return $this->_source;
    }
    
    //actions
    public function add($registration){
        if( !empty($registration['first_name']) ){
			$first_name = htmlentities($registration['first_name']);
			$last_name = htmlentities($registration['last_name']);
			$email = htmlentities($registration['email']);
			$adress = htmlentities($registration['adress']);
			$street_number = htmlentities($registration['street_number']);
			$zip_code = htmlentities($registration['zip_code']);
			$city = htmlentities($registration['city']);
            $created = date('Y-m-d h:i:s');
            //create object
            $registration = new Registration(array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'email' => $email,
				'adress' => $adress,
				'street_number' => $street_number,
				'zip_code' => $zip_code,
				'city' => $city,
				'created' => $created,
            	'createdBy' => $createdBy
			));
            //add it to db
            $this->_registrationManager->add($registration);
            $this->_actionMessage = '
            <div class="alert alert-success">
            Step3 Registration Completed Successfully
            </div>
            ';  
            $this->_typeMessage = "success";
            $this->_source = "view/registration.php";
        }
        else{
            $this->_actionMessage = '
            <div class="alert alert-success">
            There is an error in Registration
            </div>
            ';
            $this->_typeMessage = "error";
            $this->_source = "view/registration.php";
        }
    }
    

    
    

    
    
}
    